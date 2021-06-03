<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('name', 'مسئول')->orWhere('name', 'admin')->first();
        $buyer = Role::where('name', 'بائع')->orWhere('name', 'buyer')->first();

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@domain.com',
            'password' => Hash::make('12345678'),
            'role_id' => $admin->id,
        ]);

        DB::table('users')->insert([
            'name' => 'buyer',
            'email' => 'buyer@domain.com',
            'password' => Hash::make('12345678'),
            'role_id' => $buyer->id,
        ]);
    }
}
