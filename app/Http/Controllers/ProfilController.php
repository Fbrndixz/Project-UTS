<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index() 
    {
        return "halo, saya berada dihalaman dokter index";
    }

    public function create() 
    {
        return "halo, saya berdada dihalaman tambah data dokter";
    }

    public function edit($id) 
    {
        return "halo, saya berada di halaman edit dengan nilai $id";
    }

    public function show($id) 
    {
        return "halo, saya berada dihalaman show dengan nilai $id";
    }
}
