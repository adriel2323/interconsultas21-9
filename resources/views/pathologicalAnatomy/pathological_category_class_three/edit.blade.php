@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Anatomía Patológica - Categorías Nivel III
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pathologicalCategoryClassThree, ['route' => ['pathologicalCategoryClassThree.update', $pathologicalCategoryClassThree->id], 'method' => 'patch']) !!}

                        @include('pathologicalAnatomy.pathological_category_class_three.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection