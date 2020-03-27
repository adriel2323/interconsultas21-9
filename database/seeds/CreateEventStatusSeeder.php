<?php

use Illuminate\Database\Seeder;

class CreateEventStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Surgery\EventStatus::create([
            'name' => 'Programada',
            'color' => '#969696'
        ]);

        \App\Models\Surgery\EventStatus::create([
            'name' => 'Realizada',
            'color' => 'yellow'
        ]);

        \App\Models\Surgery\EventStatus::create([
            'name' => 'Suspendida',
            'color' => 'pink'
        ]);

        \App\Models\Surgery\EventStatus::create([
            'name' => 'Entró al quirófano y se suspendió',
            'color' => 'green'
        ]);

        \App\Models\Surgery\EventStatus::create([
            'name' => 'Emergencia',
            'color' => 'red'
        ]);

        \App\Models\Surgery\EventStatus::create([
            'name' => 'Paciente Ingresado',
            'color' => '72afd2'
        ]);
    }
}
