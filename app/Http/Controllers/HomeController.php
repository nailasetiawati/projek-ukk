<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home';
        $kategoris = Kategori::paginate(6);
        $products = Item::orderBy('name')->get();
        return view('contents.home.index', compact('title', 'kategoris', 'products'));
    }

    public function category($id)
   {
        $category = Kategori::where('id',$id)->first();
        $title = $category->name;
        $kategoris = Kategori::paginate(6);
        $products = Item::where('kategori_id',$id)->get();
        return view('contents.home.index', compact('title', 'products', 'kategoris'));
   } 

   public function getproduct(Request $request)
   {
        $products = Item::where('id', $request->product_id)->first();
        return $products;
   }
}
