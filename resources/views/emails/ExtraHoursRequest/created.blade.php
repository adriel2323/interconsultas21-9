@component('mail::message')
A quien corresponda:<br>
<b>{{$extraHourRequest->creator->name}}</b> ha solicitado su aprobación para realizar horas extras en el sector {{ $extraHourRequest->department->name }}

@component('mail::panel')
<b>Fecha: </b> {{ \Carbon\Carbon::parse($extraHourRequest->created_at)->format('d/m/Y') }} <br>
<b>Solicitante: </b> {{$extraHourRequest->creator->name}}<br>
<b>Sector: </b> {{$extraHourRequest->department->name}} <br>
<b>Empleado que realizará las horas extras: </b> {{$extraHourRequest->employee->full_name}} <br>
<b>Empleado a cubrir: </b> {{$extraHourRequest->coveredEmployee->full_name}} <br>
<b>Fecha y hora de inicio: </b> {{ \Carbon\Carbon::parse($extraHourRequest->from)->format('d/m/Y H:i') }} <br>
<b>Fecha y hora de fin: </b> {{ \Carbon\Carbon::parse($extraHourRequest->to)->format('d/m/Y H:i') }} <br>

<b>Observaciones: </b><br>
{{$extraHourRequest->comments}}<br>
@endcomponent

Muchas Gracias. <br>
Administración FNSR
@endcomponent