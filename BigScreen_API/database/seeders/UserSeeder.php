<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
			'name'              => 'Admin',
			'email'             => 'admin@admin.fr',
			'email_verified_at' => now(),
			'password'          => Hash::make('admin'), // admin
			'remember_token'    => Str::random(10),
		]);
        User::create([
			'name'              => 'Minh',
			'email'             => 'admi@admi.fr',
			'email_verified_at' => now(),
			'password'          => Hash::make('admi'), // admi
			'remember_token'    => Str::random(10),
		]);
    }
}
