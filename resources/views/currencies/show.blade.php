@extends('layout.card')

@section('card')
@include('currencies.show_fields')
<a href="{{ route('currencies.index') }}" class="btn btn-default">
    @lang('crud.back')
</a>
@endsection
