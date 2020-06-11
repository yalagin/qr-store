@extends('layout.card')

@section('card')
    <section class="content-header">
        <h1>
            @lang('models/options.singular')
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('options.show_fields')
                    <a href="{{ route('options.index') }}" class="btn btn-default">
                        @lang('crud.back')
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
