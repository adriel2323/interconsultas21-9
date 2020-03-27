<?php

namespace App\Exports;

use App\Models\InternshipBiopsies;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class InternshipBiopsiesExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    use Exportable;
    private $date1;
    private $date2;
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($date1, $date2)
    {
        $this->date1 = $this->formatDate($date1);
        $this->date2 = $this->formatDate(Carbon::parse($date2)->addDay());
    }

    public function collection()
    {
        return InternshipBiopsies::whereBetween('created_at',[$this->date1, $this->date2])->get();
    }

    public function headings(): array
    {
        return [
            'N° Biopsia',
            'Nombre Paciente',
            'N° Documento',
            'Tipo de Biopsia',
            'Médico Derivante',
            'Obra Social',
            'Orden Autorizada',
            'Patologo'
        ];
    }

    public function map($biopsy): array
    {
        return [
            $biopsy->id,
            $biopsy->patient_name,
            $biopsy->patient_document,
            $biopsy->biopsy_type->name,
            $biopsy->doctor->name,  //Medico derivante
            $biopsy->os->name,
            $biopsy->autorized_order,
            $biopsy->patologist->name
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
