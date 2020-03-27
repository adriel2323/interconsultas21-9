<?php

use Illuminate\Database\Seeder;
use App\Models\Surgery\SurgeryRoom;

class SurgeryResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<7;$i++) {
            SurgeryRoom::create([
               'name' => "Quirófano " . ($i+1),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
        }
    }
}
