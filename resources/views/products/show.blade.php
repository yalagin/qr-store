@extends('layout.default')

@section('content')
    <div class="card card-custom gutter-b">
        <div class="card-body">
            <section class="content-header">
                <h1>
                    Products
                </h1>
            </section>
            <div class="content">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row" style="padding-left: 20px">
                            @include('products.show_fields')
                            <br>
                        </div>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                        <a href="{{ route('products.edit', [$products->id]) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
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
