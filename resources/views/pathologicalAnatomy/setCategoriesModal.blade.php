<div class="row">
    <div class="col-sm-12">
        <div class="form-group col-sm-12">
            {!! Form::label('pathology_category_class_one_id', 'Categoría Nivel I:') !!}
            @if(is_null($sample->pathological_category_level_one_id))
                {!! Form::select('pathology_category_class_one_id', \App\Models\pathologicalAnatomy\PathologicalCategoryClassOne::all()->pluck('name', 'id'), null, ['class' => 'form-control chosen-select', 'onchange' => 'bringSecondLevelCategories();', 'placeholder' => 'Seleccione una categoría']) !!}
            @else
                {!! Form::select('pathology_category_class_one_id', \App\Models\pathologicalAnatomy\PathologicalCategoryClassOne::all()->pluck('name', 'id'), $sample->pathological_category_level_one_id, ['class' => 'form-control chosen-select', 'onchange' => 'bringSecondLevelCategories();', 'placeholder' => 'Seleccione una categoría']) !!}
            @endif
        </div>

        @if(is_null($sample->pathological_category_level_one_id))
            <div class="form-group col-sm-12">
                <div id="secondLevelCategoriesSelect"></div>
            </div>
        @else
            <div class="form-group col-sm-12">
                <div id="secondLevelCategoriesSelect">
                    {!! Form::label('pathology_category_class_two_id', 'Categoría Nivel II:') !!}
                    {!! Form::select('pathology_category_class_two_id', \App\Models\pathologicalAnatomy\PathologicalCategoryClassTwo::where('pathology_category_class_one_id',$sample->pathological_category_level_one_id)->get()->pluck('name', 'id'), $sample->pathological_category_level_two_id, ['class' => 'form-control chosen-select', 'onchange' => 'bringThirdLevelCategoriesSelect();', 'placeholder' => 'Seleccione una categoría']) !!}
                </div>
            </div>
        @endif

        @if(is_null($sample->pathological_category_level_three_id))
            <div class="form-group col-sm-12">
                <div id="thirdLevelCategoriesSelect"></div>
            </div>
        @else
            <div class="form-group col-sm-12">
                <div id="thirdLevelCategoriesSelect">
                    {!! Form::label('pathology_category_class_three_id', 'Categoría Nivel III:') !!}
                    {!! Form::select('pathology_category_class_three_id', \App\Models\pathologicalAnatomy\PathologicalCategoryClassThree::where('pathology_category_class_two_id',$sample->pathological_category_level_two_id)->get()->pluck('name', 'id'), $sample->pathological_category_level_three_id, ['class' => 'form-control chosen-select', 'onchange' => 'bringFourthLevelCategoriesSelect();', 'placeholder' => 'Seleccione una categoría']) !!}
                </div>
            </div>
        @endif

        @if(is_null($sample->pathological_category_level_four_id))
            <div class="form-group col-sm-12">
                <div id="fourthLevelCategoriesSelect"></div>
            </div>
        @else
            <div class="form-group col-sm-12">
                <div id="fourthLevelCategoriesSelect">
                    {!! Form::label('pathology_category_class_four_id', 'Categoría Nivel IV:') !!}
                    {!! Form::select('pathology_category_class_four_id', \App\Models\pathologicalAnatomy\PathologicalCategoryClassFour::where('pathology_category_class_three_id',$sample->pathological_category_level_three_id)->get()->pluck('name', 'id'), $sample->pathological_category_level_four_id, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione una categoría']) !!}
                </div>
            </div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div id="results"></div>
    </div>
</div>