@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Biopsias de Internados
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($internshipBiopsies, ['route' => ['internshipBiopsies.update', $internshipBiopsies->id], 'method' => 'patch']) !!}

                        @include('internship_biopsies.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection