<section class="panel panel-primary">
    <header class="panel-heading">
        <h2 class="title">Códigos de facturación</h2>
    </header>
</section>

<div class="panel-body">
    @include('flash::message')
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('quantity', 'Cantidad:') }}
            {{ Form::text('quantity', null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('quantity', 'Código:') }}
            {{ Form::select('nomenclator', App\Models\Nomenclator\NomenclatorPractice::all()->pluck('code', 'id'), null, ['class' => 'form-control chosen-select']) }}
        </div>
    </div>
</div>





