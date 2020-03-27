@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cheques
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($accountingCheck, ['route' => ['accountingChecks.update', $accountingCheck->id], 'method' => 'patch']) !!}

                        @include('accounting.accounting_checks.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection