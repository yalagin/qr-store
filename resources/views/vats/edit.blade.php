@extends('layout.card')

@section('card')

       @include('common.errors')
       @include('flash::message')

       {!! Form::model($vat, ['route' => ['vats.update', $vat->id], 'method' => 'patch']) !!}

            @include('vats.fields')

       {!! Form::close() !!}
@endsection
