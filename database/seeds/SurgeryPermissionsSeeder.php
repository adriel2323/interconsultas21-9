<?php

use Illuminate\Database\Seeder;

class SurgeryPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Spatie\Permission\Models\Permission::create(['name' => 'surgery.updatePatientData', 'guard_name' => 'web']);
        \Spatie\Permission\Models\Permission::create(['name' => 'surgery.updateSurgeryData', 'guard_name' => 'web']);
        \Spatie\Permission\Models\Permission::create(['name' => 'surgery.updateSurgeryComments', 'guard_name' => 'web']);
        \Spatie\Permission\Models\Permission::create(['name' => 'surgery.updateSurgeryEventData', 'guard_name' => 'web']);
        \Spatie\Permission\Models\Permission::create(['name' => 'surgery.createSurgicalProtocol', 'guard_name' => 'web']);
        \Spatie\Permission\Models\Permission::create(['name' => 'surgery.deleteSurgicalProtocol', 'guard_name' => 'web']);
    }
}
