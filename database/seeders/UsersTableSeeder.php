<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin@admin'),
            'auth_type' => 'Email',
            'choosed_theme' => 'light',
            'email_verified_at' => now()
        ]);
    }
}
