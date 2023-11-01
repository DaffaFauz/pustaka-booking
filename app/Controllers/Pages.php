<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'active' => 'Home',
            'title' => 'Beranda'
        ];
        echo view('layout/home', $data);
    }
}
