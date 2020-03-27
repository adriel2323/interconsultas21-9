@component('mail::message')
Estimado <b>{{$interconsult->requested->name}}</b>: <br>
<b>{{$interconsult->requester->name}}</b> lo ha solicitado para realizar una interconsulta.

@component('mail::panel')
<b>Fecha: </b> {{\Carbon\Carbon::parse($interconsult->created_at)->format('d/m/Y')}} <br>
<b>Solicitante: </b> {{$interconsult->requester->name}}<br>
<b>Habitación: </b> {{$interconsult->room->name}} <br>
<b>Observaciones: </b><br>
{{$interconsult->observations}}<br>
<b>Haga click en el siguiente enlace para marcar la interconsulta como vista</b><br>
<a href="http://interconsultas.fnsr.com.ar/Interconsultings/notifications/setViewedStatus/{{$interconsult->id}}">Marcar como visto</a>
@endcomponent

Muchas Gracias. <br>
Administración FNSR
@endcomponent