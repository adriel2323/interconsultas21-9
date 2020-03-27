<?php

use Illuminate\Database\Seeder;

class AccountingCheckMakingPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Spatie\Permission\Models\Permission::create(['name' => 'accounting.checkMaking.view', 'guard_name' => 'web']);
        \Spatie\Permission\Models\Permission::create(['name' => 'accounting.checkMaking.create', 'guard_name' => 'web']);
        \Spatie\Permission\Models\Permission::create(['name' => 'accounting.checkMaking.edit', 'guard_name' => 'web']);
        \Spatie\Permission\Models\Permission::create(['name' => 'accounting.checkMaking.delete', 'guard_name' => 'web']);
    }
}
