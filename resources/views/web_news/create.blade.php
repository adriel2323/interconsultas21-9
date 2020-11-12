@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Novedades Web
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        @include('flash::message')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    @include('web_news.fields')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/js/WebNews/WebNews.js"></script>
@endsection