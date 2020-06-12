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
