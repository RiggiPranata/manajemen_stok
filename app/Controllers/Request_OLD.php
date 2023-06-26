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

        // Kurangi jumlah stok berdasarkan FIFO
        $manajemenStok = $this->manajemenStokModel->where('id_barang', $data['id_barang'])->orderBy('tanggal_masuk', 'ASC')->findAll();

        $sisaJumlahPenjualan = $data['jumlah'];
        foreach ($manajemenStok as $ms) {
            $stokAwal = $ms['stok_barang'];
            $jumlahStok = $ms['sisa_barang'];
            $idTransaksi = $ms['id_transaksi'];

            if ($jumlahStok == 0) {
                $this->manajemenStokModel->update($idTransaksi, ['barang_keluar' => $stokAwal, 'sisa_barang' => 0]);
            } else {
                if ($sisaJumlahPenjualan <= $jumlahStok) {
                    // Jumlah penjualan lebih kecil atau sama dengan jumlah stok pada pasokan
                    $sisaStok = $jumlahStok - $sisaJumlahPenjualan;
                    $barangKeluar = $stokAwal - $sisaStok;
                    $this->manajemenStokModel->update($idTransaksi, ['barang_keluar' => $barangKeluar, 'sisa_barang' => $sisaStok]);
                    break;
                } else {
                    // Jumlah penjualan lebih besar dari jumlah stok pada pasokan
                    $this->manajemenStokModel->update($idTransaksi, ['barang_keluar' => $stokAwal, 'sisa_barang' => 0]);
                    $sisaJumlahPenjualan = $sisaJumlahPenjualan - $jumlahStok;
                }
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
        $id = $this->request->getVar('id');
        if (empty($dateTime)) {
            $dateTimeOdl = $this->requestModel->find($id);
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
        // Kurangi jumlah stok berdasarkan FIFO
        $manajemenStok = $this->manajemenStokModel->where('id_barang', $data['id_barang'])->orderBy('tanggal_masuk', 'ASC')->findAll();
        $request = $this->requestModel->find($id);

        $sisaJumlahPenjualan = $data['jumlah'];
        if ($sisaJumlahPenjualan < $request['jumlah']) {
            foreach ($manajemenStok as $ms) {
                $stokAwal = $ms['stok_barang'];
                $jumlahStok = $ms['sisa_barang'];
                $idTransaksi = $ms['id_transaksi'];
                //logic error need algoritma

                dd($idTransaksi, $stokAwal, $jumlahStok, $sisaJumlahPenjualan, $request['jumlah']);
                if ($jumlahStok == 0) {
                    // dd($idTransaksi, $stokAwal, $jumlahStok, $sisaJumlahPenjualan, $request['jumlah']);
                    $this->manajemenStokModel->update($idTransaksi, ['barang_keluar' => ($jumlahStok + $sisaJumlahPenjualan), 'sisa_barang' => ($stokAwal - $sisaJumlahPenjualan)]);
                    continue;
                } else {
                    if ($sisaJumlahPenjualan <= $jumlahStok) {
                        // Jumlah penjualan lebih kecil atau sama dengan jumlah stok pada pasokan
                        dd($idTransaksi,  $stokAwal, $jumlahStok, $sisaJumlahPenjualan, $request['jumlah']);
                        $sisaStok = $stokAwal - (($sisaJumlahPenjualan + $request['jumlah']) - $request['jumlah']);
                        $barangKeluar = $sisaStok + $sisaJumlahPenjualan;
                        $this->manajemenStokModel->update($idTransaksi, ['barang_keluar' => $barangKeluar, 'sisa_barang' => ($stokAwal - $barangKeluar)]);
                        break;
                        // dd($idTransaksi, $barangKeluar, $sisaStok, $stokAwal, $jumlahStok, $sisaJumlahPenjualan, $request['jumlah']);
                    } else {
                        // Jumlah penjualan lebih besar dari jumlah stok pada pasokan
                        // dd($idTransaksi, $stokAwal, $jumlahStok, $sisaJumlahPenjualan, $request['jumlah']);
                        $this->manajemenStokModel->update($idTransaksi, ['barang_keluar' => 0, 'sisa_barang' => $stokAwal]);
                        break;
                    }
                }
            }
        } else {
            foreach ($manajemenStok as $ms) {
                $stokAwal = $ms['stok_barang'];
                $jumlahStok = $ms['sisa_barang'];
                $idTransaksi = $ms['id_transaksi'];

                if ($jumlahStok == 0) {
                    $this->manajemenStokModel->update($idTransaksi, ['barang_keluar' => $stokAwal, 'sisa_barang' => 0]);
                } else {
                    if ($sisaJumlahPenjualan <= $jumlahStok) {
                        // Jumlah penjualan lebih kecil atau sama dengan jumlah stok pada pasokan
                        $sisaStok = $stokAwal - (($sisaJumlahPenjualan + $request['jumlah']) - $request['jumlah']);
                        $barangKeluar = $stokAwal - $sisaStok;
                        $this->manajemenStokModel->update($idTransaksi, ['barang_keluar' => $barangKeluar, 'sisa_barang' => $sisaStok]);
                        break;
                    } else {
                        // Jumlah penjualan lebih besar dari jumlah stok pada pasokan
                        $this->manajemenStokModel->update($idTransaksi, ['barang_keluar' => $stokAwal, 'sisa_barang' => 0]);
                        $sisaJumlahPenjualan = $sisaJumlahPenjualan - $jumlahStok;
                    }
                }
            }
        }
        $this->requestModel->update($id, $data);
        return redirect()->to('manage_request');
    }


    public function delete($id)
    {
        $this->requestModel->delete(['id_penjualan' => $id], false);
        return redirect()->to('manage_request');
    }
}
