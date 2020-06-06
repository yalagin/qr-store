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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card card-custom gutter-b">
        <div class="card-body">
            <h1>
                Products
            </h1>
            @include('products.table',['products'=> $categories->products])
        </div>
    </div>
@endsection
