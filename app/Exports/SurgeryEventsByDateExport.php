<?php

namespace App\Exports;

use App\Models\Surgery\SurgeryEvent;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SurgeryEventsByDateExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    use Exportable;
    private $date1;
    private $date2;

    public function __construct($date1, $date2)
    {
        $this->date1 = $this->formatDate($date1);
        $this->date2 = $this->formatDate(Carbon::parse($date2)->addDay());
    }

    public function collection()
    {
        return SurgeryEvent::whereBetween('start_date',[$this->date1, $this->date2])->where('status_id', 2)->get();
    }

    public function headings(): array
    {
        return [
            'Fecha',
            'Nombre Paciente',
            'Obra Social',
            'Tipo de Cirugía',
            'Cirujano'
        ];
    }

    public function map($surgery): array
    {
        return [
            \Carbon\Carbon::parse($surgery->start_date)->format('d/m/Y H:i'),
            $surgery->EventData->patient_name,
            $surgery->EventData->Os->name,
            $surgery->EventData->surgeryType->description,
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
