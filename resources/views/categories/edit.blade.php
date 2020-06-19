@extends('layout.card')

@section('card')

       @include('common.errors')
       @include('flash::message')

       {!! Form::model($categories, ['route' => ['categories.update', $categories->id], 'method' => 'patch']) !!}

            @include('categories.fields')

       {!! Form::close() !!}
@endsection
