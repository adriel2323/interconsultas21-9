<?php

use Illuminate\Database\Seeder;

class ExtraHoursRequestPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Spatie\Permission\Models\Permission::create(['name' => 'extraHoursRequest.view', 'guard_name' => 'web']);
        \Spatie\Permission\Models\Permission::create(['name' => 'extraHoursRequest.create', 'guard_name' => 'web']);
        \Spatie\Permission\Models\Permission::create(['name' => 'extraHoursRequest.edit', 'guard_name' => 'web']);
        \Spatie\Permission\Models\Permission::create(['name' => 'extraHoursRequest.delete', 'guard_name' => 'web']);
    }
}
