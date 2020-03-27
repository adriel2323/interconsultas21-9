@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Recibos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($receipts, ['route' => ['accounting.receipts.update', $receipts->id], 'method' => 'patch']) !!}

                        @include('accounting.receipts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection