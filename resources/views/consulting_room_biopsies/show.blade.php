@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Biopsias de Consultorio
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('consulting_room_biopsies.show_fields')
                    <a href="{!! route('consultingRoomBiopsies.index') !!}" class="btn btn-default">Volver</a>
                </div>
            </div>
        </div>
    </div>
@endsection
