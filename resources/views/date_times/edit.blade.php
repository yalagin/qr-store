@extends('layout.card')

@section('card')

       @include('adminlte-templates::common.errors')
       @include('flash::message')

       {!! Form::model($dateTime, ['route' => ['dateTimes.update', $dateTime->id], 'method' => 'patch']) !!}

            @include('date_times.fields')

       {!! Form::close() !!}
@endsection
