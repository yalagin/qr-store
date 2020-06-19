@extends('layout.card')

@section('card')
@include('common.errors')
{!! Form::open(['route' => 'categories.store']) !!}

    @include('categories.fields')

{!! Form::close() !!}
@endsection
