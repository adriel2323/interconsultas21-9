@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Compañías de ART
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($insuranceCompanies, ['route' => ['insuranceCompanies.update', $insuranceCompanies->id], 'method' => 'patch']) !!}

                        @include('insurance_companies.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection