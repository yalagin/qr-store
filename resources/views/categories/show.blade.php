@extends('layout.default')

@section('content')
    <div class="card card-custom gutter-b">
        <div class="card-body">
            <section class="content-header">
                <h1>
                    Categories
                </h1>
            </section>
            <div class="content">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row" style="padding-left: 20px">
                            @include('categories.show_fields')
                            <br>
                        </div>
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
                        <a href="{{ route('categories.edit', [$categories->id]) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
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



