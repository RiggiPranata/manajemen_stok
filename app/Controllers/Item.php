<?php

namespace App\Controllers;

use App\Models\ItemModel;
use App\Models\KatagoriModel;

class Item extends BaseController
{
    protected $uri;
    protected $urisegments;
    protected $itemModel;
    protected $db;
    protected $builder;
    protected $katagoriModel;

    public function __construct()
    {
        $this->uri = service('uri');
        $this->itemModel = new ItemModel();
        $this->katagoriModel = new KatagoriModel();
        $this->urisegments = $this->uri->getTotalSegments();
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('barang');
    }

    public function index()
    {

        $this->builder->select('id_barang,kode_barang, nama_barang,katagori,satuan,harga, keterangan');
        $this->builder->join('katagori', 'katagori.id_katagori = barang.id_katagori');
        $this->builder->orderBy('kode_barang', 'ASC');
        $query = $this->builder->get();

        $data = [
            'title' => 'Item',
            // 'bc' => 'Manage Supplier',
            // 'link_bc' => 'manage_supplier',
            'segment' => $this->urisegments,
            'items' => $query->getResultArray()
        ];
        // dd($data['item'][0]);
        return view('Admin/Item/manage_item', $data);
    }

    public function delete($id)
    {
        $this->itemModel->delete(['id_barang' => $id], false);
        return redirect()->to('item');
    }

    public function add()
    {
        $data = [
            'title' => 'Add Item',
            'bc' => 'Item',
            'link_bc' => 'item',
            'segment' => $this->urisegments,
            'katagori' => $this->katagoriModel->findAll(),
        ];
        // dd($data['katagori']);
        return view('Admin/Item/add_item', $data);
    }

    public function save()
    {
        $data = [
            'kode_barang' => $this->request->getVar('kode_barang'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'id_katagori' => number_format($this->request->getVar('katagori')),
            'satuan' => $this->request->getVar('satuan'),
            'harga' => $this->request->getVar('harga'),
            'keterangan' => $this->request->getVar('keterangan'),
        ];
        // dd($data);

        $this->itemModel->save($data);
        return redirect()->to('item');
    }

    public function edit($id)
    {
        $this->builder->select('id_barang,kode_barang, nama_barang,barang.id_katagori,katagori,satuan,harga, keterangan');
        $this->builder->join('katagori', 'katagori.id_katagori = barang.id_katagori');
        $this->builder->where('id_barang', $id);
        $query = $this->builder->get();

        $data = [
            'title' => 'Edit Item',
            'bc' => 'Item',
            'link_bc' => 'item',
            'segment' => $this->urisegments,
            'item' => $query->getRowArray(),
            'katagori' => $this->katagoriModel->findAll(),
        ];
        return view('Admin/Item/edit_item', $data);
    }

    public function update()
    {
        $id = $this->request->getVar('id');
        $data = [
            'kode_barang' => $this->request->getVar('kode_barang'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'id_katagori' => number_format($this->request->getVar('katagori')),
            'satuan' => $this->request->getVar('satuan'),
            'harga' => $this->request->getVar('harga'),
            'keterangan' => $this->request->getVar('keterangan'),
        ];
        $this->itemModel->update($id, $data);
        return redirect()->to('item');
    }

    public function get_harga()
    {
        $id = $this->request->getPost('id');

        $barang = $this->itemModel->find($id);
        if ($barang) {
            $harga = $barang['harga'];
            echo $harga;
        }
    }
}
