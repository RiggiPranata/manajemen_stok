<?php

namespace App\Controllers;

use App\Libraries\Breadcrumb;

class Karyawan extends BaseController
{
    protected $uri;

    public function __construct()
    {
        $this->uri = service('uri');
    }

    public function index()

    {
        $urisegments = $this->uri->getTotalSegments();
        $data = [
            'title'  => 'TB. XYZ',
            'config' => config('Auth'),
            'title' => 'My Profile',
            'segment' => $urisegments,
        ];
        return view('Karyawan/index', $data);
    }
}
