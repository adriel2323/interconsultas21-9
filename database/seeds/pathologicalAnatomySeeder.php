<?php

use Illuminate\Database\Seeder;

class pathologicalAnatomySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\pathologicalAnatomy\pathologicalAnatomyType::create([
            'name' => 'Biopsia'
        ]);

        \App\Models\pathologicalAnatomy\pathologicalAnatomyType::create([
            'name' => 'Papanicolaous'
        ]);
    }
}
