<?php

use Illuminate\Database\Seeder;

class AccountingBankAccountsPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Spatie\Permission\Models\Permission::create(['name' => 'accounting.bankAccounts.view', 'guard_name' => 'web']);
        \Spatie\Permission\Models\Permission::create(['name' => 'accounting.bankAccounts.create', 'guard_name' => 'web']);
        \Spatie\Permission\Models\Permission::create(['name' => 'accounting.bankAccounts.edit', 'guard_name' => 'web']);
        \Spatie\Permission\Models\Permission::create(['name' => 'accounting.bankAccounts.delete', 'guard_name' => 'web']);
    }
}
