@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
           Anatomía Patológica - Categorías Nivel III
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <div class=col-sm-12>
                        @include('pathologicalAnatomy.pathological_category_class_three.show_fields')
                    </div>
                    <a href="{!! route('pathologicalCategoryClassThree.index') !!}" class="btn btn-primary">Volver</a>
                </div>
            </div>
        </div>
    </div>
@endsection
