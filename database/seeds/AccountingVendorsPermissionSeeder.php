<?php

use Illuminate\Database\Seeder;

class AccountingVendorsPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Spatie\Permission\Models\Permission::create(['name' => 'accounting.vendors.view', 'guard_name' => 'web']);
        \Spatie\Permission\Models\Permission::create(['name' => 'accounting.vendors.create', 'guard_name' => 'web']);
        \Spatie\Permission\Models\Permission::create(['name' => 'accounting.vendors.edit', 'guard_name' => 'web']);
        \Spatie\Permission\Models\Permission::create(['name' => 'accounting.vendors.delete', 'guard_name' => 'web']);
    }
}
