<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $title = 'Barang';
        $items = Item::get();
        return view('contents.item.index', compact('title', 'items'));
    }

    public function tambah()
    {
        $title = 'Tambah Barang';
        $kategoris = Kategori::get();
        return view('contents.item.tambah', compact('title', 'kategoris'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kategori_id' => 'required',
            'name'        => 'required',
            'price'       => 'required',
        ]);

        $items = Item::create([
            'kategori_id' => $validatedData['kategori_id'],
            'name'        => $validatedData['name'],
            'price'       => $validatedData['price'],
            'image'       => 'inigambar.jpg'
        ]);

        return redirect('/item')->with('Berhasil', 'Barang '.$request->name.' Berhasil ditambahkan!');
    }

    public function edit()
    {
        $title = 'Edit Barang';
        return view('contents.item.edit', compact('title'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kategori_id'   => 'required',
            'name'          => 'required',
            'price'         => 'required'
        ]);

        $item = Item::where('id', $id)->update($validatedData);

        return redirect('/item')('Berhasil', 'Barang '.$request->name.' Berhasil dirubah!');
    }
}
