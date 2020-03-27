<?php

use Illuminate\Database\Seeder;

class CloudMedPatientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(\App\Models\GesInMed\Patients::all() as $patient)
        {
            ini_set(‘memory_limit’,’1GB’);
            $city = DB::connection('cloudmed')->table('cities')->where('name', '%'.$patient->localidad.'%')->get();
            DB::connection('cloudmed')->table('patients')->insert([
                'name' => $patient->apellido,
                'document_type_id' => 1,
                'document_number' => $patient->documento,
                'gender_id' => $patient->sexo,
                'city_id' => $city[0]->id,
                'birthday' => $patient->fecha_nacimiento,
                'address' => $patient->calle . ' ' . $patient->numero
            ]);
        }
    }
}
