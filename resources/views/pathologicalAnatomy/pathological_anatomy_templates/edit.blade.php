@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Plantillas de informe de Anatomías Patológicas
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pathologicalAnatomyTemplate, ['route' => ['pathologicalAnatomyTemplates.update', $pathologicalAnatomyTemplate->id], 'method' => 'patch']) !!}

                        @include('pathologicalAnatomy.pathological_anatomy_templates.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection