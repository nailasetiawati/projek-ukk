<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $title = 'Kategori Barang';
        $kategoris = Kategori::get();
        return view('contents.kategori.index', compact('title', 'kategoris'));
    }

    public function tambah()
    {
        $title = 'Tambah Kategori Barang';
        return view('contents.kategori.tambah', compact('title'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'  => 'required|unique:kategoris',
        ]);

        $kategori = Kategori::create($validatedData);

        return redirect('/kategori')->with('Berhasil', 'Kategori '.$request->name.' Berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $title = 'Edit Kategori Barang';
        $kategoris = Kategori::where('id', $id)->get();
        return view('contents.kategori.edit', compact('title', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'  =>   'required'
        ]);

        $kategori = Kategori::where('id', $id)->update($validatedData);

        return redirect('/kategori')->with('Berhasil', 'Kategori '.$request->name.' Berhasil dirubah!');
    }

    public function delete($id){
        Kategori::where('id', $id)->delete();

        return redirect('/kategori')->with('Berhasil', 'Kategori Berhasil dihapus!');
    }

    
}
