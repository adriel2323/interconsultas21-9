<html>
<head>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{$_SERVER["DOCUMENT_ROOT"].'/vendor/bootstrap/css/bootstrap.min.css'}}">
    <title>Códigos de diagnóstico.pdf</title>
    <meta charset="UTF-8" />
    <style>
        /*thead { display: table-header-group }*/
        /*tfoot { display: table-row-group }*/
        /*tr { page-break-inside: avoid }*/
        /*.page-break {*/
            /*page-break-after: always;*/
        /*}*/
    </style>
</head>
<body>
<div class="row">
    <div class="col-md-12">
        <div class="pull-right">
            <img src="{{ $_SERVER["DOCUMENT_ROOT"]."/images/logo.png" }}" width="100px" height="100px">
        </div>
        <div style="text-align: center;">
            <h3>Códigos de diagnóstico.</h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <ol>
            @foreach($codes as $code)
                <li>{{ $code->name }}</li>
                @foreach($code->childCategories as $childCategoryLevelTwo)
                <ol>
                    <li>{{$childCategoryLevelTwo->name}}</li>
                    <ol>
                        @foreach($childCategoryLevelTwo->childCategories as $childCategoryLevelThree)
                            <li>{{ $childCategoryLevelThree->name }}</li>
                            <ol>
                                @foreach($childCategoryLevelThree->childCategories as $childCategoryLevelFour)
                                        <li>{{ $childCategoryLevelFour->name }}</li>
                                @endforeach
                            </ol>
                        @endforeach
                    </ol>
                </ol>
                @endforeach
            @endforeach
        </ol>
    </div>
</div>
</body>
</html>
