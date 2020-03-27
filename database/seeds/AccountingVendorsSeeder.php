<?php

use Illuminate\Database\Seeder;

class AccountingVendorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Maatwebsite\Excel\Facades\Excel::import(new \App\Imports\AccountingVendorImports, 'proveedores.xlsx');
    }
}
