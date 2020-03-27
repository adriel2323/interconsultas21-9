@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Novedades Web
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($webNews, ['route' => ['webNews.update', $webNews->id], 'method' => 'patch']) !!}

                        @include('web_news.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection