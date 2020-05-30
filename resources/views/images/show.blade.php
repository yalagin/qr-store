@extends('layout.card')

@section('card')
    <section class="content-header">
        <h1>
            Image
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('images.show_fields')
                    <br>
                </div>
                <a href="{{ route('images.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
