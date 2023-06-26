<?php

namespace App\Controllers;

use App\Models\KatagoriModel;

class Katagori extends BaseController
{
    protected $uri;
    protected $urisegments;
    protected $katagoriModel;

    public function __construct()
    {
        $this->uri = service('uri');
        $this->katagoriModel = new KatagoriModel();
        $this->urisegments = $this->uri->getTotalSegments();
    }

    public function index()
    {
        $data = [
            'title' => 'Catagory',
            // 'bc' => 'Manage Supplier',
            // 'link_bc' => 'manage_supplier',
            'segment' => $this->urisegments,
            'katagori' => $this->katagoriModel->orderBy('katagori', 'ASC')->findAll(),
        ];
        return view('Admin/Catagory/manage_catagory', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Catagory',
            'bc' => 'Catagory',
            'link_bc' => 'catagory',
            'segment' => $this->urisegments,
        ];
        return view('Admin/Catagory/add_catagory', $data);
    }

    public function save()
    {
        $data = [
            'katagori' => $this->request->getVar('katagori'),
        ];
        $this->katagoriModel->save($data);
        return redirect()->to('catagory');
    }

    public function delete($id)
    {
        $this->katagoriModel->delete(['id_katagori' => $id], false);
        return redirect()->to('catagory');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Catagory',
            'bc' => 'Catagory',
            'link_bc' => 'catagory',
            'segment' => $this->urisegments,
            'catagory' => $this->katagoriModel->find($id),
        ];
        return view('Admin/Catagory/edit_catagory', $data);
    }

    public function update()
    {
        $id = $this->request->getVar('id');
        $data = [
            'katagori' => $this->request->getVar('catagory'),
        ];
        $this->katagoriModel->update($id, $data);
        return redirect()->to('catagory');
    }
}
