@section('css')
    @include('layouts.datatables_css')
@endsection

<div class="table-responsive">
   <table class="table table-striped table-bordered table-hover" id="newsTable">
       <thead>
           <tr>
               <th>Fecha de publicación</th>
               <th>Mostrar hasta</th>
               <th>Título</th>
               <th>Descripción corta</th>
               <th>Eliminar publicación</th>
           </tr>
       </thead>
       <tbody>
            @foreach($news as $publication)
                <tr>
                    <td> {{ \Carbon\Carbon::parse($publication->created_at)->format('d/m/Y') }}</td>
                    <td> {{ \Carbon\Carbon::parse($publication->show_until)->format('d/m/Y') }}</td>
                    <td> {{ $publication->title }}</td>
                    <td> {!! $publication->short_description !!}</td>
                    <td>
                        {!! Form::open(['id' => $publication->id, 'route' => ['webNews.destroy', $publication->id], 'method' => 'delete']) !!}

                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
                                'type' => 'button',
                                'class' => 'btn btn-danger btn-xs',
                                'onclick' => "return confirmDelete('$publication->id'); return false;"
                            ]) !!}</td>

                    {!! Form::close() !!}
                </tr>
            @endforeach
       </tbody>
   </table>
</div>

@section('scripts')

@endsection