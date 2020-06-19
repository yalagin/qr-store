@extends('layout.card')

@section('card')

       @include('common.errors')
       @include('flash::message')

       {!! Form::model($products, ['route' => ['products.update', $products->id], 'method' => 'patch']) !!}

            @include('products.fields')

       {!! Form::close() !!}
@endsection
