@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Proveedores
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($accountingVendor, ['route' => ['accountingVendors.update', $accountingVendor->id], 'method' => 'patch']) !!}

                        @include('accounting.accounting_vendors.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection