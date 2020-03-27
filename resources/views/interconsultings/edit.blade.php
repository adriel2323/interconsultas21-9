@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Interconsultas
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($interconsulting, ['route' => ['interconsultings.update', $interconsulting->id], 'method' => 'patch']) !!}

                        @include('interconsultings.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection