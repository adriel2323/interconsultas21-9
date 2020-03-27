@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tipos de Cirugía
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($surgeryType, ['route' => ['surgeryTypes.update', $surgeryType->id], 'method' => 'patch']) !!}

                        @include('surgeryTypes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection