<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <button class="btn btn-primary" type="button" onclick="papanicolausTemplateModal();return false;">Plantilla de Papanicolaous</button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <button class="btn btn-primary" type="button" onclick="addSignature();">Añadir firma</button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="form-group col-md-3">
                {{ Form::label('titles', 'Títulos:') }}
                {!! Form::select('titles', \App\Models\pathologicalAnatomy\PathologicalAnatomyReportTitle::all()->pluck('name', 'id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione un título', 'onchange' => 'getTitle();']) !!}
            </div>
            <div class="form-group col-md-3">
                {{ Form::label('templateCategory', 'Categoría de plantilla:') }}
                {!! Form::select('templateCategory', \App\Models\pathologicalAnatomy\PathologicalAnatomyTemplatesTitles::all()->pluck('name', 'id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione una categoría de plantilla', 'onchange' => 'getTemplateCategory();']) !!}
            </div>
            <div class="form-group col-md-3">
                <div id="templateSelect"></div>
            </div>

            <div class="form-group col-md-3">
                <div id="templateSelect"></div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <textarea id="editor" class="form-control"> @include('pathologicalAnatomy.pathologicalAnatomyBasicTemplate', ['sample' => $sample])</textarea>
            </div>
        </div>
    </div>
</div>