<?php

use Illuminate\Database\Seeder;

class PathologicalAnatomyReportTitlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\pathologicalAnatomy\PathologicalAnatomyReportTitle::create(['name' => 'MACROSCOPÍA: ']);
        \App\Models\pathologicalAnatomy\PathologicalAnatomyReportTitle::create(['name' => 'MICROSCOPÍA: ']);
        \App\Models\pathologicalAnatomy\PathologicalAnatomyReportTitle::create(['name' => 'DIAGNÓSTICO CITOLÓGICO: ']);
        \App\Models\pathologicalAnatomy\PathologicalAnatomyReportTitle::create(['name' => 'DIAGNÓSTICO HISTOLÓGICO: ']);
        \App\Models\pathologicalAnatomy\PathologicalAnatomyReportTitle::create(['name' => 'DIAGNÓSTICO: ']);
        \App\Models\pathologicalAnatomy\PathologicalAnatomyReportTitle::create(['name' => 'CONCLUSIÓN: ']);
        \App\Models\pathologicalAnatomy\PathologicalAnatomyReportTitle::create(['name' => 'DESCRIPCIÓN: ']);
        \App\Models\pathologicalAnatomy\PathologicalAnatomyReportTitle::create(['name' => 'DIAGNÓSTICO CITOLÓGICO CON CORRELACIÓN ECOGRÁFICA: ']);
        \App\Models\pathologicalAnatomy\PathologicalAnatomyReportTitle::create(['name' => 'DIAGNÓSTICO CITOLÓGICO CON CORRELACIÓN CLÍNICA: ']);
        \App\Models\pathologicalAnatomy\PathologicalAnatomyReportTitle::create(['name' => 'PAPANICOLAOU CERVICAL: ']);
    }
}
