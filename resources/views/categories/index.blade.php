@extends('layout.card')

@section('card')
    <section class="content-header">
        <h1 class="pull-left">Categories</h1>
        <br>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
               href="{{ route('categories.create') }}">Add New</a>
        </h1>
    </section>

    <div class="content">

        @include('flash::message')

        @include('categories.list')

{{--        <div class="box box-primary">--}}
{{--            <div class="box-body">--}}
{{--                @include('categories.table')--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="text-center">--}}

{{--        </div>--}}
    </div>
@endsection

