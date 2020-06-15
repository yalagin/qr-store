@extends('layout.card')

@section('card')
@include('vats.show_fields')
<a href="{{ route('vats.index') }}" class="btn btn-default">
    @lang('crud.back')
</a>
@endsection
