<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
        $this->call(PlansTableSeeder::class);
        $this->call(GatewayTableSeeder::class);
	    $this->call(RolesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CurrencyTableSeeder::class);
    }
}
