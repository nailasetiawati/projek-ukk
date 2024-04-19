<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Item;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name'      =>  'Admin',
            'username'  =>  'admin',
            'password'  =>  Hash::make('password'),
            'email'     =>  'admin@admin.com',            
        ]);

        Kategori::create([
            'name'  =>  'Makanan'
        ]);
        Kategori::create([
            'name'  =>  'Minuman'
        ]);
        Kategori::create([
            'name'  =>  'Mainan'
        ]);
        Kategori::create([
            'name'  =>  'Kecantikan'
        ]);
        Kategori::create([
            'name'  =>  'Elektronik'
        ]);
        Kategori::create([
            'name'  =>  'Pakaian'
        ]);
        
        Item::create([
            'kategori_id'   =>  1,
            'name'          =>  'Taro Net 36g',
            'price'         =>  '5000',
            'image'         =>  'taro.png'
        ]);
        Item::create([
            'kategori_id'   =>  1,
            'name'          =>  'Kanzler 65g',
            'price'         =>  '8000',
            'image'         =>  'kanzler.jpg'
        ]);
        Item::create([
            'kategori_id'   =>  1,
            'name'          =>  'Chitato 75g',
            'price'         =>  '9000',
            'image'         =>  'chitato.jpg'
        ]);
        Item::create([
            'kategori_id'   =>  2,
            'name'          =>  'Oatside 200ml',
            'price'         =>  '7000',
            'image'         =>  'oatside.webp'
        ]);
        Item::create([
            'kategori_id'   =>  2,
            'name'          =>  'Nescafe IB 220ml',
            'price'         =>  '7500',
            'image'         =>  'nescafe.jpg'
        ]);
        Item::create([
            'kategori_id'   =>  2,
            'name'          =>  'Ultra Milk 200ml',
            'price'         =>  '4500',
            'image'         =>  'ultra.webp'
        ]);
    }
}
