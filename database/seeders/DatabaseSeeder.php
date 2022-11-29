<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kategori;
use App\Models\User;
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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name'=> 'admin',
            'email'=> 'admin@mail.com',
            'password'=> Hash::make('admin@mail.com'),
            'role'=> 'admin',
        ]);
        User::create([
            'name'=> 'editor',
            'email'=> 'editor@mail.com',
            'password'=> Hash::make('editor@mail.com'),
            'role'=> 'editor',
        ]);
        User::create([
            'name'=> 'user',
            'email'=> 'user@mail.com',
            'password'=> Hash::make('user@mail.com'),
            'role'=> 'user',
        ]);
        Kategori::create([
            'namaKategori'=> 'Kategori 1',
            'descKategori'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        ]);
        Kategori::create([
            'namaKategori'=> 'Kategori 2',
            'descKategori'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        ]);
        Kategori::create([
            'namaKategori'=> 'Kategori 3',
            'descKategori'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        ]);
        Kategori::create([
            'namaKategori'=> 'Kategori 4',
            'descKategori'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
        ]);
    }
}
