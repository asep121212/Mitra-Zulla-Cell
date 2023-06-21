<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'is_admin' => 1,
        ]);

        \App\Models\User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345678'),
            'is_admin' => 0,
        ]);
        \App\Models\Category::create([
            'id'    => 1,
            'name' => 'Tri',
        ]);

        \App\Models\Category::create([
            'id' => 2,
            'name' => 'Telkomsel',
        ]);
         \App\Models\Category::create([
            'id' => 3,
            'name' => 'Smartfren',
        ]);
        \App\Models\Category::create([
            'id' => 4,
            'name' => 'Indoosat',
        ]);
        \App\Models\Category::create([
            'id' => 5,
            'name' => 'Axis',
        ]);

        \App\Models\Product::create([
            'category_id' => 2,
            'name' => 'Telkomsel Rp 5.000',
            'quantity' => 10,
            'price' => '7000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 2,
            'name' => 'Telkomsel Rp 10.000',
            'quantity' => 10,
            'price' => '12000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 2,
            'name' => 'Telkomsel Rp 15.000',
            'quantity' => 10,
            'price' => '17000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 2,
            'name' => 'Telkomsel Rp 20.000',
            'quantity' => 10,
            'price' => '22000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 2,
            'name' => 'Telkomsel Rp 25.000',
            'quantity' => 10,
            'price' => '27000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 2,
            'name' => 'Telkomsel Rp 30.000',
            'quantity' => 10,
            'price' => '32000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 2,
            'name' => 'Telkomsel Rp 50.000',
            'quantity' => 10,
            'price' => '52000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);


        \App\Models\Product::create([
            'category_id' => 1,
            'name' => 'Tri Rp.5000',
            'quantity' => 20,
            'price' => '7000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 1,
            'name' => 'Tri Rp.10000',
            'quantity' => 20,
            'price' => '12000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 1,
            'name' => 'Tri Rp.15000',
            'quantity' => 20,
            'price' => '17000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 1,
            'name' => 'Tri Rp.20000',
            'quantity' => 20,
            'price' => '22000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 1,
            'name' => 'Tri Rp.25000',
            'quantity' => 20,
            'price' => '27000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 1,
            'name' => 'Tri Rp.30000',
            'quantity' => 20,
            'price' => '32000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 1,
            'name' => 'Tri Rp.50000',
            'quantity' => 20,
            'price' => '52000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 3,
            'name' => 'Smartfren Rp.5000',
            'quantity' => 20,
            'price' => '7000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 3,
            'name' => 'Smartfren Rp.10000',
            'quantity' => 20,
            'price' => '12000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 3,
            'name' => 'Smartfren Rp.15000',
            'quantity' => 20,
            'price' => '17000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 3,
            'name' => 'Smartfren Rp.20000',
            'quantity' => 20,
            'price' => '22000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 3,
            'name' => 'Smartfren Rp.25000',
            'quantity' => 20,
            'price' => '27000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 3,
            'name' => 'Smartfren Rp.30000',
            'quantity' => 20,
            'price' => '32000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 3,
            'name' => 'Smartfren Rp.50000',
            'quantity' => 20,
            'price' => '52000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 4,
            'name' => 'Indoosat Rp.5000',
            'quantity' => 20,
            'price' => '7000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 4,
            'name' => 'Indoosat Rp.10000',
            'quantity' => 20,
            'price' => '12000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 4,
            'name' => 'Indoosat Rp.15000',
            'quantity' => 20,
            'price' => '17000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 4,
            'name' => 'Indoosat Rp.20000',
            'quantity' => 20,
            'price' => '22000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 4,
            'name' => 'Indoosat Rp.25000',
            'quantity' => 20,
            'price' => '27000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 4,
            'name' => 'Indoosat Rp.30000',
            'quantity' => 20,
            'price' => '32000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 4,
            'name' => 'Indoosat Rp.50000',
            'quantity' => 20,
            'price' => '52000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);

        \App\Models\Product::create([
            'category_id' => 5,
            'name' => 'Axis Rp.5000',
            'quantity' => 20,
            'price' => '7000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 5,
            'name' => 'Axis Rp.10000',
            'quantity' => 20,
            'price' => '12000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 5,
            'name' => 'Axis Rp.15000',
            'quantity' => 20,
            'price' => '17000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 5,
            'name' => 'Axis Rp.20000',
            'quantity' => 20,
            'price' => '22000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 5,
            'name' => 'Axis Rp.25000',
            'quantity' => 20,
            'price' => '27000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 5,
            'name' => 'Axis Rp.30000',
            'quantity' => 20,
            'price' => '32000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        \App\Models\Product::create([
            'category_id' => 5,
            'name' => 'Axis Rp.50000',
            'quantity' => 20,
            'price' => '52000',
            'description' => 'desc',
            'status' => 1,
            'raw' => 0,
        ]);
        

        \App\Models\Setting::create([
            'name' => 'Zulla Center',
            'service_time' => '09.00 - 15.00',
            'address' => 'Jl.Urip Sumoharjo',
            'description' => 'Mitra Center Zulla Cell',
            'keywords' => 'Hai Guys',
            'instagram' => 'https://github.com/asep121212',
            'facebook' => 'https://github.com/ariyadi',
            'email' => 'aryadi.ay48@gmail.com',
            'instagram' => 'https://github.com/Ariyadidwisaputra',
            'whatsapp' => '083872442275',
            'phone' => '083872442275',
        ]);
    }
}
