<?php

namespace App\Exports;

use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\Surgery\SurgeryEvent;

class SurgeryEventExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $date1 = Carbon::parse(Carbon::now()->format('Y/m/d'));
        $date2 = Carbon::parse(Carbon::now()->format('Y/m/d'));
        $date2->addHours(24);

        $date1 = $this->formatDate($date1);
        $date2 = $this->formatDate($date2);


        return SurgeryEvent::whereHas('EventData', function ($query) {
            $query->where('x_ray_specialist_needed', 1);
        })->whereBetween('start_date', [$date1, $date2])->get();

    }

    public function headings(): array
    {
        return [
            'Fecha de Inicio',
            'Fecha de Finalización',
            'N° Quirófano',
            'Nombre del Paciente',
            'Documento del Paciente',
            'Cirujano'
        ];
    }

    public function map($surgery): array
    {
        return [
           Carbon::parse($surgery->start_date)->format('d/m/Y H:i'),
           Carbon::parse($surgery->end_date)->format('d/m/Y H:i'),
            $surgery->surgeryRoom->name,
            $surgery->EventData->patient_name,
            $surgery->EventData->patient_document,
            $surgery->EventData->surgeon->name
        ];
    }

    public function formatDate($value)
    {
        $date = \Carbon\Carbon::parse($value)->format('Y-m-d');

        $date .= "T";

        $date .= \Carbon\Carbon::parse($value)->format('H:i:s');

        return $date;
    }
}
