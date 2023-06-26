<?php

namespace App\Controllers;

use App\Models\SupplierModel;

class Supplier extends BaseController
{
    protected $uri;
    protected $urisegments;
    protected $supplierModel;

    public function __construct()
    {
        $this->uri = service('uri');
        $this->supplierModel = new SupplierModel();
        $this->urisegments = $this->uri->getTotalSegments();
    }

    public function index()
    {
        $data = [
            'config' => config('Auth'),
            'title' => 'Manage Supplier',
            'segment' => $this->urisegments,
            'supplier' => $this->supplierModel->orderBy('nama_supplier', 'ASC')->findAll(),
        ];
        // dd($data['supplier']['nama_supplier']);
        return view('Admin/Suppliers/manage_supplier', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Supplier',
            'bc' => 'Manage Supplier',
            'link_bc' => 'manage_supplier',
            'segment' => $this->urisegments,
            'supplier' => $this->supplierModel->find($id),
        ];
        return view('Admin/Suppliers/edit_supplier', $data);
    }

    public function update()
    {
        $id = $this->request->getVar('id');
        $data = [
            'nama_supplier' => $this->request->getVar('nama_supplier'),
            'alamat' => $this->request->getVar('alamat'),
            'telepon' => $this->request->getVar('no_telepon'),
        ];
        $this->supplierModel->update($id, $data);
        return redirect()->to('manage_supplier');
    }

    public function delete($id)
    {
        $this->supplierModel->delete(['id_supplier' => $id], false);
        return redirect()->to('manage_supplier');
    }

    public function add()
    {
        $data = [
            'title' => 'Add Supplier',
            'bc' => 'Manage Supplier',
            'link_bc' => 'manage_supplier',
            'segment' => $this->urisegments,
        ];
        return view('Admin/Suppliers/add_supplier', $data);
    }
    public function save()
    {
        $data = [
            'nama_supplier' => $this->request->getVar('nama_supplier'),
            'alamat' => $this->request->getVar('alamat'),
            'telepon' => $this->request->getVar('no_telepon'),
        ];
        $this->supplierModel->save($data);
        return redirect()->to('manage_supplier');
    }
}
