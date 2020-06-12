@extends('layout.card')

@section('card')
@include('adminlte-templates::common.errors')
{!! Form::open(['route' => 'products.store']) !!}

    @include('products.fields')

{!! Form::close() !!}
@endsection
