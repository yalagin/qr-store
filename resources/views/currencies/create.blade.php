@extends('layout.card')

@section('card')
@include('common.errors')
{!! Form::open(['route' => 'currencies.store']) !!}

    @include('currencies.fields')

{!! Form::close() !!}
@endsection
