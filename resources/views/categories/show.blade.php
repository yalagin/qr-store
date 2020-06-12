@extends('layout.default')

@section('content')
    <div class="card card-custom gutter-b">
        <div class="card-body">
                @include('categories.show_fields')
                <br>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">@lang('crud.back')</a>
            <a href="{{ route('categories.edit', [$categories->id]) }}" class="btn btn-primary">@lang('crud.edit')</a>
        </div>
    </div>
    @if(!$categories->images->isEmpty())
        <div class="card card-custom gutter-b">
            <div class="card-body">
                <h1>
                    Images
                </h1>
                @include('images.table',['images'=> $categories->images])
            </div>
        </div>
    @endif
    @if(!$categories->products->isEmpty())
    <div class="card card-custom gutter-b">
        <div class="card-body">
            <h1>
                Products
            </h1>
            @include('products.table',['products'=> $categories->products])
        </div>
    </div>
    @endif
@endsection
