@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tipos de Biopsias
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($biopsiesTypes, ['route' => ['biopsiesTypes.update', $biopsiesTypes->id], 'method' => 'patch']) !!}

                        @include('biopsies_types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection