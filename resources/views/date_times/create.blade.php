@extends('layout.card')

@section('card')
@include('adminlte-templates::common.errors')
{!! Form::open(['route' => 'dateTimes.store']) !!}

    @include('date_times.fields')

{!! Form::close() !!}
@endsection
