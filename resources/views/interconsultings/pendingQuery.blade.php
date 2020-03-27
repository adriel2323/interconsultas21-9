@if(count($interconsultings) < 1)
    <h3 class="text-success">El médico no posee ninguna interconsulta pendiente.</h3>
@else
    <h3 class="text-danger">El médico posee interconsultas pendientes</h3>
    <table class="table table-stripped table-bordered">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Sector</th>
                <th>Solicitante</th>
                <th>Paciente</th>
                <th>Estado</th>
                @can("interconsulting.edit")
                    <th></th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach($interconsultings as $interconsulting)
                <tr>
                    <td>{{\Carbon\Carbon::parse($interconsulting->created_at)->format('d/m/Y H:s')}}</td>
                    <td>{{$interconsulting->room->name}}</td>
                    <td>{{$interconsulting->requester->name}}</td>
                    <td>{{$interconsulting->patient_name}}</td>
                    @if($interconsulting->status_id == 1)

                        <td> <button class='btn btn-xs' style='background-color:yellow;color:grey;'><b>{{ $interconsulting->status->name }}</b></button> </td>

                    @elseif ($interconsulting->status_id == 2)

                        <td> <button class='btn btn-xs' style='background-color:blue;color:#fff;'><b>{{$interconsulting->status->name}}</b></button> </td>

                    @else

                       <td> <button class='btn btn-xs' style='background-color:red;color:#fff;'><b>{{$interconsulting->status->name}}</b></button> </td>

                    @endif
                    @can("interconsulting.changeStatus")
                        <td><button type="button" class="btn btn-xs" style='background-color:green;color:#fff;' onclick="location.href='/interconsulting/changeStatus/{{$interconsulting->id}}/3'">Finalizar</button></td>
                    @endcan

                </tr>
            @endforeach
        </tbody>
    </table>
@endif