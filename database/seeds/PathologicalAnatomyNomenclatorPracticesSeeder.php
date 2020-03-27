<?php

use Illuminate\Database\Seeder;

class PathologicalAnatomyNomenclatorPracticesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Nomenclator\NomenclatorPractice::create([
            'code' => '150101',
            'description' => 'BIOPSIA POR INCISION O PUNCION.'
        ]);
        \App\Models\Nomenclator\NomenclatorPractice::create([
            'code' => '150102',
            'description' => 'ESTUDIO MACRO Y MICROSCOPICO DE PIEZA OPERATORIA.'
        ]);
        \App\Models\Nomenclator\NomenclatorPractice::create([
            'code' => '150103',
            'description' => 'ESTUDIO MACRO Y MICROSCOPIO DE PIEZA DE RESECCION.'
        ]);
        \App\Models\Nomenclator\NomenclatorPractice::create([
            'code' => '150104',
            'description' => 'BIOPSIA POR CONGELACION Y ESTUDIO DIFERIDO DEL...'
        ]);
        \App\Models\Nomenclator\NomenclatorPractice::create([
            'code' => '150105',
            'description' => 'ESTUDIO BIOPSICO SERIADO Y SEMISERIADO -MINIMO 15.'
        ]);
        \App\Models\Nomenclator\NomenclatorPractice::create([
            'code' => '150201',
            'description' => 'BIOPSIA POR INCISION O PUNCION.'
        ]);
        \App\Models\Nomenclator\NomenclatorPractice::create([
            'code' => '150202',
            'description' => 'ESTUDIO MACRO Y MICROSCOPICO DE PIEZA OPERATORIA.'
        ]);
        \App\Models\Nomenclator\NomenclatorPractice::create([
            'code' => '150203',
            'description' => 'ESTUDIO MACRO Y MICROSCOPIO DE PIEZA DE RESECCION.'
        ]);
        \App\Models\Nomenclator\NomenclatorPractice::create([
            'code' => '150204',
            'description' => 'BIOPSIA POR CONGELACION Y ESTUDIO DIFERIDO DEL...'
        ]);
        \App\Models\Nomenclator\NomenclatorPractice::create([
            'code' => '150205',
            'description' => 'ESTUDIO BIOPSICO SERIADO Y SEMISERIADO -MINIMO 15.'
        ]);
    }
}
