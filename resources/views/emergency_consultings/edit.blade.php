@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Consultas de Guardia
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($emergencyConsultings, ['route' => ['emergencyConsultings.update', $emergencyConsultings->id], 'method' => 'patch']) !!}

                        @include('emergency_consultings.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection