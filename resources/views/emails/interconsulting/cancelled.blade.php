@component('mail::message')
Estimado <b>{{$interconsult->requested->name}}</b>: <br>
<b>{{$interconsult->requester->name}}</b> canceló la interconsulta solicitada con fecha {{\Carbon\Carbon::parse($interconsult->created_at)->format('d/m/Y')}} para la habitación {{$interconsult->room->name}}.

Muchas Gracias. <br>
Administración FNSR
@endcomponent