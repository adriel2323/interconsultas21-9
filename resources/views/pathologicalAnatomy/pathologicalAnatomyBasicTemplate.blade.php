<div class="row">
    <ul>

        @if(isset($sample->surgeryEvent))
            <li>Fecha: {{ \Carbon\Carbon::parse($sample->surgeryEvent->start_date)->format('d/m/Y') }}</li>

        @else
            <li>Fecha: {{ \Carbon\Carbon::now()->format('d/m/Y') }}</li>
        @endif

        <li>CÓDIGOS DE FACTURACIÓN: </li>

        @if(isset($sample->patient->apellido))
            <li>PRACTICADO A: <b>{{ $sample->patient->apellido }} (Cuil: {{ $sample->patient->cuil_real }})</b></li>
        @else
            <li>PRACTICADO A: <b>{{ $sample->surgeryEvent->EventData->patient_name }} (Cuil: {{ $sample->surgeryEvent->EventData->patient_document }})</b></li>
        @endif

        @if(isset($sample->cdiDate->doctor->ApellidoYNombre))
            <li>POR INDICACIÓN DEL Dr/a: <b>{{ isset($sample->cdiDate->doctor->ApellidoYNombre) ? $sample->cdiDate->doctor->ApellidoYNombre : " " }}</b></li>
        @elseif(isset($sample->surgeryEvent))
            <li>POR INDICACIÓN DEL Dr/a: <b>{{ isset($sample->surgeryEvent->EventData->surgeon->name) ? $sample->surgeryEvent->EventData->surgeon->name : " "}}</b></li>
        @else
            POR INDICACIÓN DEL Dr/a: {{isset($sample->doctor->name) ? $sample->doctor->name : " "}}
        @endif
    {{--    @if(isset($sample->patient->fecha_nacimiento))
            <li>EDAD: <b>{{ \Carbon\Carbon::parse($sample->patient->fecha_nacimiento)->diff(\Carbon\Carbon::now())->format('%y Años') }}</b></li>
        @endif
--}}
        @if(is_null($sample->cdi_date_id) && is_null($sample->surgery_event_id))
            <li>Obra Social: <b>{{ $sample->patient->medicalInsurance->Descripcion }}</b>
        @else
            @if(isset($sample->cdiDate->os->Descripcion))
                <li>Obra Social: <b>{{ $sample->cdiDate->os->Descripcion }}</b>
            @else
                <li>Obra Social: <b>{{ $sample->surgeryEvent->EventData->Os->name }}</b></li>
            @endif
        @endif
    </ul>
</div>
