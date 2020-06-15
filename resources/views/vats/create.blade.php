@extends('layout.card')

@section('card')
@include('adminlte-templates::common.errors')
{!! Form::open(['route' => 'vats.store']) !!}

    @include('vats.fields')

{!! Form::close() !!}
@endsection
