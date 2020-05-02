<?php

use Illuminate\Database\Seeder;

use App\Models\NominalAccount;
use App\Models\NominalTransaction;

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

        $sales = NominalAccount::create([
            'name' => 'Sales',
            'default' => 'credit'
        ]);
        NominalAccount::create([
            'name' => 'Stock'
        ]);
        $rent = NominalAccount::create([
            'name' => 'Rent'
        ]);
        NominalAccount::create([
            'name' => 'Telephone'
        ]);
        $bank = NominalAccount::create([
            'name' => 'Bank Balance'
        ]);
        $vat = NominalAccount::create([
            'name' => 'VAT',
            'default' => 'credit'
        ]);

        NominalTransaction::create([
            'accounted_at' => now(),
            'amount' => 120,
            'debit_nominal_account_id' => $bank->id,
            'credit_nominal_account_id' => $sales->id,
        ]);

        NominalTransaction::create([
            'accounted_at' => now(),
            'amount' => 20,
            'debit_nominal_account_id' => $sales->id,
            'credit_nominal_account_id' => $vat->id,
        ]);
        NominalTransaction::create([
            'accounted_at' => now(),
            'amount' => 200,
            'debit_nominal_account_id' => $rent->id,
            'credit_nominal_account_id' => $bank->id,
        ]);
    }
}
