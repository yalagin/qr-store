@extends('layout.card')

@section('card')

       @include('adminlte-templates::common.errors')
       @include('flash::message')

       {!! Form::model($currency, ['route' => ['currencies.update', $currency->id], 'method' => 'patch']) !!}

            @include('currencies.fields')

       {!! Form::close() !!}
@endsection
