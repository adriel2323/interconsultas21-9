<?php

use Illuminate\Database\Seeder;

class NursesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=258;$i<422;$i++) {
            DB::table('model_has_roles')->insert([
               'role_id' => 7,
                'model_type' => 'App\User',
                'model_id' => $i
            ]);
        }
    }
}
