<?php

namespace App\Exports;

use App\Models\Doctor;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SpecialistsExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    public function collection()
    {
        /* Quito los servicios de Enfermeria, Administración, Técnicos de Rayos */
        return Doctor::where('service_id','<>',37)
                        ->where('service_id','<>',32)
                        ->where('service_id','<>',34)
                        ->orderBy('name', 'ASC')
                        ->get();
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'Email',
            'Teléfono',
            'Servicio'
        ];
    }

    public function map($doctor): array
    {
        return [
            $doctor->name,
            $doctor->email,
            $doctor->phone,
            $doctor->service->name
        ];
    }
}
