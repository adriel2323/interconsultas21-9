<?php

use Illuminate\Database\Seeder;

class InstitutionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Institutions\Institution::create([
           'name' => 'FNSR'
        ]);
    }
}
