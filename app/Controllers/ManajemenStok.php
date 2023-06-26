<?php

namespace App\Controllers;

use App\Models\ItemModel;
use App\Models\SupplierModel;
use App\Models\ManajemenStokModel;

use CodeIgniter\I18n\Time;

class ManajemenStok extends BaseController
{
    protected $uri;
    protected $urisegments;
    protected $itemModel;
    protected $db;
    protected $builder;
    protected $supplierModel;
    protected $manajemenStokModel;
    protected $jmlStok = 0;

    public function __construct()
    {
        $this->uri = service('uri');
        $this->itemModel = new ItemModel();
        $this->supplierModel = new SupplierModel();
        $this->manajemenStokModel = new ManajemenStokModel();
        $this->urisegments = $this->uri->getTotalSegments();
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('manajemen_stok');
    }

    public function index()
    {
        $this->builder->select('id_transaksi,kode_barang,nama_barang,nama_supplier,stok_barang,barang_keluar,sisa_barang,manajemen_stok.keterangan ,tanggal_masuk');
        $this->builder->join('barang', 'barang.id_barang = manajemen_stok.id_barang');
        $this->builder->join('supplier', 'supplier.id_supplier = manajemen_stok.id_supplier');
        $this->builder->orderBy('id_transaksi', 'DESC');
        $query = $this->builder->get();

        $data = [
            'title' => 'Manage Supply',
            // 'bc' => 'Manage Supplier',
            // 'link_bc' => 'manage_supplier',
            'segment' => $this->urisegments,
            'transaksi' => $query->getResultArray()
        ];
        return view('Admin/ManajemenStok/manage_supply', $data);
    }

    public function delete($id)
    {
        $this->manajemenStokModel->delete(['id_transaksi' => $id], false);
        return redirect()->to('manage_supply');
    }

    public function add()
    {
        $data = [
            'title' => 'Add Supply',
            'bc' => 'Manage Supply',
            'link_bc' => 'manage_supply',
            'segment' => $this->urisegments,
            'items' => $this->itemModel->findAll(),
            'supplier' => $this->supplierModel->findAll(),
        ];
        return view('Admin/ManajemenStok/add_supply', $data);
    }

    public function save()
    {
        $dateTime = $this->request->getVar('tanggal_masuk');
        $id = $this->request->getPost('id');

        $data = [
            'id_barang' => $this->request->getVar('id_barang'),
            'id_supplier' => $this->request->getVar('id_supplier'),
            'stok_barang' => $this->request->getVar('stok_barang'),
            'barang_keluar' => 0,
            'sisa_barang' => $this->request->getVar('stok_barang'),
            'keterangan' => $this->request->getVar('keterangan'),
            'tanggal_masuk' => date('Y-m-d H:i:s', strtotime($dateTime)),
        ];
        // dd($data['tanggal_masuk']);

        $this->manajemenStokModel->save($data);
        return redirect()->to('manage_supply');
    }

    public function edit($id)
    {
        $this->builder->select('id_transaksi,manajemen_stok.id_barang,manajemen_stok.id_supplier,kode_barang,nama_barang,nama_supplier,stok_barang,barang_keluar,sisa_barang,manajemen_stok.keterangan ,tanggal_masuk');
        $this->builder->join('barang', 'barang.id_barang = manajemen_stok.id_barang');
        $this->builder->join('supplier', 'supplier.id_supplier = manajemen_stok.id_supplier');
        $this->builder->where('id_transaksi', $id);
        $query = $this->builder->get();

        $data = [
            'title' => 'Edit Supply',
            'bc' => 'Manage Supply',
            'link_bc' => 'manage_supply',
            'segment' => $this->urisegments,
            'items' => $this->itemModel->findAll(),
            'supplier' => $this->supplierModel->findAll(),
            'transaksi' => $query->getRowArray(),
        ];
        return view('Admin/ManajemenStok/edit_supply', $data);
    }

    public function update()
    {
        $dateTime = $this->request->getVar('tanggal_masuk');
        $id = $this->request->getVar('id');
        if (empty($dateTime)) {
            $dateTimeOdl = $this->manajemenStokModel->find($id);
            $dateTime = $dateTimeOdl['tanggal_masuk'];
        } else {
            $dateTime = $this->request->getVar('tanggal_masuk');
        }
        // dd($dateTime);
        $data = [
            'id_barang' => $this->request->getVar('id_barang'),
            'id_supplier' => $this->request->getVar('id_supplier'),
            'stok_barang' => $this->request->getVar('stok_barang'),
            'barang_keluar' => $this->request->getVar('barang_keluar'),
            'sisa_barang' => $this->request->getVar('sisa_barang'),
            'keterangan' => $this->request->getVar('keterangan'),
            'tanggal_masuk' => date('Y-m-d H:i:s', strtotime($dateTime)),
        ];
        $this->manajemenStokModel->update($id, $data);
        return redirect()->to('manage_supply');
    }


    public function checkStok()
    {
        $namaBarang = $this->request->getPost('nama_barang');
        $jumlahPembelian = $this->request->getPost('jumlah_pembelian');


        // $barang = $this->manajemenStokModel->where('id_barang', $namaBarang)->;

        $this->builder->selectSum('sisa_barang');
        $this->builder->where('id_barang', $namaBarang);
        $query = $this->builder->get();

        $barang = $query->getResultObject();
        $stokBarang = $barang[0]->sisa_barang;
        if ($stokBarang < $jumlahPembelian) {
            echo json_encode(['status' => 'error', 'message' => "Stok barang tidak mencukupi, tolong infokan kepada admin/PIC."]);
        } else {
            echo json_encode(['status' => 'success']);
        }
    }
}
