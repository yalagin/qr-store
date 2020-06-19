@extends('layout.card')

@section('card')
    @include('common.errors')
    @include('flash::message')
    {!! Form::open(['route' => 'products.store']) !!}
        @include('products.fields')
    {!! Form::close() !!}
@endsection
