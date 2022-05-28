<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $clave='';
    
    public function run()
    {
        $clave=Hash::make('password');
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => $clave
        ]);
    }
}
