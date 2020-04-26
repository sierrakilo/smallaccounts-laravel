<?php

use Illuminate\Database\Seeder;

use App\Models\NominalAccount;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        NominalAccount::create([
            'name' => 'Sales'
        ]);
    }
}
