@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Biopsias de Consultorio
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'consultingRoomBiopsies.store']) !!}

                        @include('consulting_room_biopsies.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
