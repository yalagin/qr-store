@extends('layout.card')

@section('card')
    <section class="content-header">
        <h1>
            Categories
        </h1>
   </section>
    @include('adminlte-templates::common.errors')

    @include('flash::message')

{!! Form::model($categories, ['route' => ['categories.update', $categories->id], 'method' => 'patch']) !!}

    @include('categories.fields')

{!! Form::close() !!}

@endsection
