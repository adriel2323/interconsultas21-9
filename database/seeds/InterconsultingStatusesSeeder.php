<?php

use Illuminate\Database\Seeder;

class InterconsultingStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interconsulting_statuses')->insert([
           'name' => 'INGRESADA'
        ]);

        DB::table('interconsulting_statuses')->insert([
            'name' => 'VISTA'
        ]);

        DB::table('interconsulting_statuses')->insert([
            'name' => 'ATENDIDA'
        ]);

        DB::table('interconsulting_statuses')->insert([
            'name' => 'CANCELADA'
        ]);
    }
}
