@extends('layout.card')

@section('card')
@include('options.show_fields')
<a href="{{ route('options.index') }}" class="btn btn-default">
    @lang('crud.back')
</a>
@endsection
