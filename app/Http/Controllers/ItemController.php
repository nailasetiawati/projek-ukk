<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
            'image'       =>  'required',
        ]);

        
        $image = $request->file('image');
        $validatedData['image'] = time().'.'.$image->extension();
        
        $destinationPath = public_path('\img\thumbnail');
        $img = Image::make($image->path());
        $img->resize(200, 512, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$validatedData['image']);
        
        $destinationPath = public_path('/img/item-image');
        $image->move($destinationPath, $validatedData['image']);
        
        $items = Item::create($validatedData);
        return redirect('/item')->with('Berhasil', 'Barang '.$request->name.' Berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $title = 'Edit Barang';
        $items = Item::where('id', $id)->get();
        $kategori = Kategori::all();
        return view('contents.item.edit', compact('title','items','kategori'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $validatedData = $request->validate([
            'name'          => 'required',
            'price'         => 'required',
            'image'         =>  'image|file|max:5120',
        ]);

        if($request->image != null){
            $image = $request->file('image');
            $validatedData['image'] = time().'.'.$image->extension();
        
            $destinationPath = public_path('/img/thumbnail');
            $img = Image::make($image->path());
            $img->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$validatedData['image']);
    
            $destinationPath = public_path('/img/item-image');
            $image->move($destinationPath, $validatedData['image']);

            Item::where('id', $id)->update($validatedData);
        }else{
            $item = Item::where('id', $id)->update([
                'kategori_id' => $validatedData['kategori_id'],
                'name'        => $validatedData['name'],
                'price'       => $validatedData['price'],
            ]);
        }


        return redirect('/item')->with('Berhasil', 'Barang '.$request->name.' Berhasil diubah!');
    }

    public function delete($id){
        Item::where('id', $id)->delete();

        return redirect('/item')->with('Berhasil', 'Barang Berhasil dihapus!');
    }
}
