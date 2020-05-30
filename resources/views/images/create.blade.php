@extends('layout.default')

@section('content')
    <section class="content-header">
        <h1>
            Image
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'images.store', 'files' => true]) !!}

                        @include('images.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
