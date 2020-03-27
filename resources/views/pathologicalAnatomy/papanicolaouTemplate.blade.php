<div class="row">
    <div class="col-md-12">
        {!! Form::label('category1', '1- TÍTULO') !!}
        {!! Form::select('category1', \App\Models\pathologicalAnatomy\PapanicolaousTemplate::where('category', 1)->get()->pluck('description', 'id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione una opción']) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::label('category2', '2- TROFISMO') !!}
        {!! Form::select('category2', \App\Models\pathologicalAnatomy\PapanicolaousTemplate::where('category', 2)->get()->pluck('description', 'id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione una opción']) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::label('category3', '3- CEL. EXOCERVIC') !!}
        {!! Form::select('category3', \App\Models\pathologicalAnatomy\PapanicolaousTemplate::where('category', 3)->get()->pluck('description', 'id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione una opción']) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::label('category4', '4- CEL. ENDOCERVIC') !!}
        {!! Form::select('category4', \App\Models\pathologicalAnatomy\PapanicolaousTemplate::where('category', 4)->get()->pluck('description', 'id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione una opción']) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::label('category5', '5- CEL. METAPLÁSIC') !!}
        {!! Form::select('category5', \App\Models\pathologicalAnatomy\PapanicolaousTemplate::where('category', 5)->get()->pluck('description', 'id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione una opción']) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::label('category6', '6- CEL. ENDOMETRALES') !!}
        {!! Form::select('category6', \App\Models\pathologicalAnatomy\PapanicolaousTemplate::where('category', 6)->get()->pluck('description', 'id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione una opción']) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::label('category7', '7- LPN') !!}
        {!! Form::select('category7', \App\Models\pathologicalAnatomy\PapanicolaousTemplate::where('category', 7)->get()->pluck('description', 'id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione una opción']) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::label('category8', '8- HEMATÍES') !!}
        {!! Form::select('category8', \App\Models\pathologicalAnatomy\PapanicolaousTemplate::where('category', 8)->get()->pluck('description', 'id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione una opción']) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::label('category9', '9- HISTIOCITOS') !!}
        {!! Form::select('category9', \App\Models\pathologicalAnatomy\PapanicolaousTemplate::where('category', 9)->get()->pluck('description', 'id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione una opción']) !!}
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {!! Form::label('category10', '10- FLORA') !!}
        {!! Form::select('category10', \App\Models\pathologicalAnatomy\PapanicolaousTemplate::where('category', 10)->get()->pluck('description', 'id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione una opción']) !!}
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        {!! Form::label('category11', '11- FLORA ESPECIFI.') !!}
        {!! Form::select('category11', \App\Models\pathologicalAnatomy\PapanicolaousTemplate::where('category', 11)->get()->pluck('description', 'id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione una opción']) !!}
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        {!! Form::label('category12', '12- NOTAS') !!}
        {!! Form::select('category12', \App\Models\pathologicalAnatomy\PapanicolaousTemplate::where('category', 12)->get()->pluck('description', 'id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione una opción']) !!}
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        {!! Form::label('category13', '13- DIAGNÓSTICO') !!}
        {!! Form::select('category13', \App\Models\pathologicalAnatomy\PapanicolaousTemplate::where('category', 13)->get()->pluck('description', 'id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione una opción']) !!}
    </div>
</div>