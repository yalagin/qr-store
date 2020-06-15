@extends('layout.default')

@section('content')
<div class="card card-custom gutter-b">
    <div class="card-body">

        @include('products.show_fields')

    <a href="{{ route('products.index') }}" class="btn btn-default">
        @lang('crud.back')
    </a>
    <a href="{{ route('products.edit', [$products->id]) }}" class="btn btn-primary">Edit</a>
    </div>
</div>
@if(!$products->images->isEmpty())
    <div class="card card-custom gutter-b">
        <div class="card-body">
            <h1>
                Images
            </h1>
            @include('images.table',['images'=> $products->images])
        </div>
    </div>
@endif
@endsection


@push('page_toolbar_right')
    <a class="btn btn-light-primary font-weight-bold py-2 px-5 ml-2" href="{{ route('products.create') }}">@lang('crud.add_new')</a>
    <a class="btn btn-light-primary font-weight-bold py-2 px-5 ml-2" href="{{ route('products.edit',$products) }}">@lang('crud.edit')</a>
@endpush
