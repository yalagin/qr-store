@extends('layout.card')

@section('card')

       @include('adminlte-templates::common.errors')

       {!! Form::model($products, ['route' => ['products.update', $products->id], 'method' => 'patch']) !!}

            @include('products.fields')

       {!! Form::close() !!}
@endsection
