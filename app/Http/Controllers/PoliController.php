<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['polis'] = \App\Models\Poli::latest()->paginate(10);
        return view('poli_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('poli_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nama' => 'required|min:3',
            'biaya' => 'required|numeric', // Pastikan biaya adalah numeric
            'keterangan' => 'required|string', // Ganti 'text' dengan 'string'
        ]);

        $poli = new \App\Models\Poli(); // Membuat objek kosong di variabel model
        $poli->fill($requestData); // Mengisi var model dengan data yang sudah divalidasi requestData
        $poli->save(); // Menyimpan data ke database
        flash('Data sudah disimpan')->success();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Poli $poli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['poli'] = \App\Models\Poli::findOrFail($id);
        return view('poli_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'nama' => 'required|unique:polis,nama,' . $id, // Pastikan untuk memvalidasi nama dengan benar
            'biaya' => 'required|numeric',
            'keterangan' => 'required|string',
        ]);

        $poli = \App\Models\Poli::findOrFail($id);
        $poli->fill($requestData);
        $poli->save();

        flash('Data sudah diupdate')->success();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $poli = \App\Models\Poli::findOrFail($id);
        // $poli ->fill($requestData);
        $poli->delete();
        flash('Data sudah dihapus')->success();
        return back();
    }
}
