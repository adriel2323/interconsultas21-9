@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Anatomía Patológica - Categorías Nivel I
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pathologicalCategoryClassOne, ['route' => ['pathologicalCategoryClassOne.update', $pathologicalCategoryClassOne->id], 'method' => 'patch']) !!}

                        @include('pathologicalAnatomy.pathological_category_class_one.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection