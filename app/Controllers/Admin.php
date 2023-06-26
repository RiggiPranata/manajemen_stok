<?php

namespace App\Controllers;


class Admin extends BaseController
{
    protected $uri;
    protected $urisegments;
    protected $db;
    protected $builder;

    public function __construct()
    {
        $this->uri = service('uri');
        $this->urisegments = $this->uri->getTotalSegments();
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }

    public function index()
    {
        $data = [
            'config' => config('Auth'),
            'title' => 'Dashboard',
            'segment' => $this->urisegments,
        ];
        return view('Admin/index', $data);
    }

    public function manage_users()
    {

        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->distinct(true);
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();

        $data = [
            'title' => 'Manage Users',
            'segment' => $this->urisegments,
            'users' => $query->getResultArray(),
        ];
        return view('Admin/Users/manage_users', $data);
    }

    public function user_detail($id = 0)
    {


        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        $data = [
            'title' => 'User Detail',
            'bc' => 'Manage User',
            'link_bc' => 'manage_users',
            'segment' => $this->urisegments,
            'user' => $query->getRowArray(),
        ];

        if (empty($data['user'])) {
            return redirect()->to('admin');
        }

        return view('Admin/Users/user_detail', $data);
    }

    public function delete_user($id)
    {
        $this->builder->delete(['id' => $id]);
        return redirect()->to('manage_users');
    }

    public function purchase_report()
    {
        $this->builder->select('penjualan.id_penjualan,barang.kode_barang,barang.nama_barang,users.username,penjualan.jumlah,penjualan.total_harga,penjualan.tanggal_penjualan');
        $this->builder->join('barang', 'barang.id_barang = penjualan.id_barang');
        $this->builder->join('users', 'users.id = penjualan.id_user');
        $this->builder->orderBy('id_penjualan', 'DESC');
        $this->builder->from('penjualan', true);
        $query = $this->builder->get();

        $data = [
            'title' => 'Purchase Report',
            'segment' => $this->urisegments,
            'purchase' => $query->getResultArray()
        ];
        return view('Admin/PurchaseReport/index', $data);
    }
}
