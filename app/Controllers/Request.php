<?php

namespace App\Controllers;

use App\Models\ItemModel;
use App\Models\RequestModel;
use App\Models\ManajemenStokModel;

use CodeIgniter\I18n\Time;

class Request extends BaseController
{
    protected $uri;
    protected $urisegments;
    protected $itemModel;
    protected $db;
    protected $builder;
    protected $requestModel;
    protected $manajemenStokModel;

    public function __construct()
    {
        $this->uri = service('uri');
        $this->itemModel = new ItemModel();
        $this->manajemenStokModel = new ManajemenStokModel();
        $this->requestModel = new RequestModel();
        $this->urisegments = $this->uri->getTotalSegments();
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('penjualan');
    }

    public function index()
    {
        $this->builder->select('id_penjualan,kode_barang,nama_barang,username,jumlah,total_harga,tanggal_penjualan');
        $this->builder->join('barang', 'barang.id_barang = penjualan.id_barang');
        $this->builder->join('users', 'users.id = penjualan.id_user');
        $this->builder->orderBy('id_penjualan', 'DESC');
        $query = $this->builder->get();

        $data = [
            'title' => 'Manage Request Item Out',
            // 'bc' => 'Manage Supplier',
            // 'link_bc' => 'manage_supplier',
            'segment' => $this->urisegments,
            'request' => $query->getResultArray()
        ];
        return view('Request/manage_request', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Request',
            'bc' => 'Manage Request',
            'link_bc' => 'manage_request',
            'segment' => $this->urisegments,
            'items' => $this->itemModel->findAll(),
        ];
        return view('Request/add_request', $data);
    }

    public function save()
    {
        $dateTime = $this->request->getVar('tanggal_penjualan');
        $data = [
            'id_barang' => $this->request->getVar('id_barang'),
            'id_user' => user_id(),
            'jumlah' => $this->request->getVar('jumlah_barang'),
            'total_harga' => $this->request->getVar('total_harga'),
            'tanggal_penjualan' => date('Y-m-d H:i:s', strtotime($dateTime)),
        ];

        // Logic FIFO

        // Ambil inputan form
        $namaBarang = $data['id_barang'];
        $jumlahPenjualan = $data['jumlah'];

        // Validasi input
        // if (empty($namaBarang) || empty($jumlahPenjualan)) {
        //     return redirect()->back()->withInput()->with('error', 'Mohon lengkapi semua field.');
        // }

        // Ambil persediaan barang
        $supply = $this->manajemenStokModel->where('id_barang', $namaBarang)
            ->where('sisa_barang >', 0)
            ->orderBy('tanggal_masuk', 'ASC')
            ->findAll();

        // Lakukan pengurangan persediaan berdasarkan FIFO
        $sisaPenjualan = $jumlahPenjualan;

        foreach ($supply as $barang) {
            $sisaStok = $barang['sisa_barang'];
            $idTransaksi = $barang['id_transaksi'];

            if ($sisaStok >= $sisaPenjualan) {
                // Jika stok cukup untuk penjualan
                $barang['barang_keluar'] += $sisaPenjualan;
                $barang['sisa_barang'] = $sisaStok - $sisaPenjualan;

                $this->manajemenStokModel->update($idTransaksi, ['barang_keluar' => $barang['barang_keluar'], 'sisa_barang' => $barang['sisa_barang']]);

                break; // Keluar dari loop karena penjualan sudah terpenuhi
            } else {
                // Jika stok tidak mencukupi, keluarkan semua stok
                $barang['barang_keluar'] += $sisaStok;
                $barang['sisa_barang'] = 0;

                $this->manajemenStokModel->update($idTransaksi, ['barang_keluar' => $barang['barang_keluar'], 'sisa_barang' => $barang['sisa_barang']]);

                $sisaPenjualan -= $sisaStok;
            }
        }

        $this->requestModel->save($data);
        return redirect()->to('manage_request');
    }

    public function edit($id)
    {

        $request = $this->requestModel->find($id);
        $barang = $request['id_barang'];

        $this->builder->select('barang.id_barang,kode_barang,nama_barang');
        $this->builder->where('barang.id_barang', $barang);
        $this->builder->from('barang');
        $query = $this->builder->get();

        $data = [
            'title' => 'Edit Request',
            'bc' => 'Manage Request',
            'link_bc' => 'manage_request',
            'segment' => $this->urisegments,
            'request' => $request,
            'items' => $query->getRowArray(),
        ];
        // dd($data['request']);
        return view('Request/edit_request', $data);
    }

    public function update()
    {
        $dateTime = $this->request->getVar('tanggal_penjualan');
        $idPenjualan = $this->request->getVar('id');
        if (empty($dateTime)) {
            $dateTimeOdl = $this->requestModel->find($idPenjualan);
            // dd($dateTimeOdl[0]['tanggal_penjualan']);
            $dateTime = $dateTimeOdl['tanggal_penjualan'];
        } else {
            $dateTime = $this->request->getVar('tanggal_penjualan');
        }
        // dd($dateTime);
        $data = [
            'id_barang' => $this->request->getVar('id_barang'),
            'id_user' => user_id(),
            'jumlah' => $this->request->getVar('jumlah_barang'),
            'total_harga' => $this->request->getVar('total_harga'),
            'tanggal_penjualan' => date('Y-m-d H:i:s', strtotime($dateTime)),
        ];

        // logic FIFO UPDATE
        // Ambil inputan form
        $namaBarang = $data['id_barang'];
        $jumlahPenjualan = $data['jumlah'];

        // Validasi input
        // if (empty($idPenjualan) || empty($namaBarang) || empty($jumlahPenjualan)) {
        //     return redirect()->back()->withInput()->with('error', 'Mohon lengkapi semua field.');
        // }

        // Ambil data penjualan berdasarkan ID
        $penjualan = $this->requestModel->find($idPenjualan);

        if (!$penjualan) {
            return redirect()->back()->with('error', 'Data penjualan tidak ditemukan.');
        }

        // Ambil persediaan barang
        $supply = $this->manajemenStokModel->where('id_barang', $namaBarang)
            ->where('sisa_barang >', 0)
            ->orderBy('tanggal_masuk', 'ASC')
            ->findAll();

        $totalOut = $this->manajemenStokModel->selectSum('barang_keluar', 'total_keluar')
            ->where('id_barang', $namaBarang)
            ->findAll();

        $totalStok = $this->manajemenStokModel->selectSum('stok_barang', 'total_stok')
            ->where('id_barang', $namaBarang)
            ->findAll();


        // Perhitungan selisih penjualan baru dengan penjualan sebelumnya
        $selisihPenjualan = $jumlahPenjualan - $penjualan['jumlah'];
        // Jika penjualan baru lebih kecil dari penjualan sebelumnya
        if ($selisihPenjualan < 0) {
            // Mengembalikan persediaan yang dikurangi sebelumnya
            $sisaSelisih = abs($selisihPenjualan);

            foreach ($supply as $barang) {
                $sisaStok = $barang['sisa_barang'];
                $idTransaksi = $barang['id_transaksi'];

                if ($sisaStok + $barang['barang_keluar'] >= $sisaSelisih) {
                    // Mengembalikan persediaan yang cukup untuk menutup selisih penjualan
                    if ($barang['barang_keluar'] == 0) {
                        $data['jumlah'] = $penjualan['jumlah'];
                        // dd($data);
                        dd('test3');
                        break;
                    }
                    // dd($jumlahPenjualan);
                    if (($jumlahPenjualan - ($barang['barang_keluar'] + $sisaSelisih)) < $sisaStok) {
                        // dd('test2', $data['jumlah'], $barang['barang_keluar'], $penjualan['jumlah'], $jumlahPenjualan, $barang['stok_barang']);
                        $data['jumlah'] = $penjualan['jumlah'] - $barang['barang_keluar'];
                        $barang['barang_keluar'] = 0;
                        $barang['sisa_barang'] = $barang['stok_barang'];

                        $this->manajemenStokModel->update($idTransaksi, ['barang_keluar' => $barang['barang_keluar'], 'sisa_barang' => $barang['sisa_barang']]);
                        break;
                    }
                    $barang['barang_keluar'] -= $sisaSelisih;
                    $barang['sisa_barang'] = $sisaStok + $sisaSelisih;
                    dd('test1', $jumlahPenjualan, $barang['barang_keluar'], $sisaStok);
                    $this->manajemenStokModel->update($idTransaksi, ['barang_keluar' => $barang['barang_keluar'], 'sisa_barang' => $barang['sisa_barang']]);
                    break;
                } else {
                    // Mengembalikan semua persediaan yang dikurangi sebelumnya
                    $barang['barang_keluar'] = 0;
                    $barang['sisa_barang'] = $sisaStok + $barang['stok_barang'];
                    $this->manajemenStokModel->update($idTransaksi, ['barang_keluar' => $barang['barang_keluar'], 'sisa_barang' => $barang['sisa_barang']]);

                    $sisaSelisih -= $sisaStok;
                }
            }
        }
        // Jika penjualan baru lebih besar dari penjualan sebelumnya
        else if ($selisihPenjualan > 0) {
            // Mengurangi persediaan berdasarkan FIFO
            $sisaPenjualan = $selisihPenjualan;

            foreach ($supply as $barang) {
                $sisaStok = $barang['sisa_barang'];
                $idTransaksi = $barang['id_transaksi'];

                if ($sisaStok >= $sisaPenjualan) {
                    // Jika stok cukup untuk penjualan
                    $barang['barang_keluar'] += $sisaPenjualan;
                    $barang['sisa_barang'] = $sisaStok - $sisaPenjualan;
                    $this->manajemenStokModel->update($idTransaksi, ['barang_keluar' => $barang['barang_keluar'], 'sisa_barang' => $barang['sisa_barang']]);

                    break;
                } else {
                    // Jika stok tidak mencukupi, keluarkan semua stok
                    $barang['barang_keluar'] += $sisaStok;
                    $barang['sisa_barang'] = 0;
                    $this->manajemenStokModel->update($idTransaksi, ['barang_keluar' => $barang['barang_keluar'], 'sisa_barang' => $barang['sisa_barang']]);

                    $sisaPenjualan -= $sisaStok;
                }
            }
        }

        // Update data penjualan
        $this->requestModel->update($idPenjualan, $data);
        return redirect()->to('manage_request');
    }


    public function delete($id)
    {
        $this->requestModel->delete(['id_penjualan' => $id], false);
        return redirect()->to('manage_request');
    }
}
