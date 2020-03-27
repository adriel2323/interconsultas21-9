@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Ortopedias
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($orthopedics, ['route' => ['orthopedics.update', $orthopedics->id], 'method' => 'patch']) !!}

                        @include('orthopedics.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection