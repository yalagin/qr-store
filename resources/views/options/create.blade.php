@extends('layout.card')

@section('card')
@include('common.errors')
{!! Form::open(['route' => 'options.store']) !!}

    @include('options.fields')

{!! Form::close() !!}
@endsection
