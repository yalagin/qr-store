@extends('layout.card')

@section('card')

       @include('common.errors')

       {!! Form::model($options, ['route' => ['options.update', $options->id], 'method' => 'patch']) !!}

            @include('options.fields')

       {!! Form::close() !!}
@endsection
