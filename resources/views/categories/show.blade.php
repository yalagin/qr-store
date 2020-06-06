@extends('layout.card')

@section('card')
    <section class="content-header">
        <h1>
            Categories
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="column" style="padding-left: 20px">
                    @include('categories.show_fields')
                    <br>
                </div>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
