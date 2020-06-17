@extends('layout.card')

@section('card')
@include('date_times.show_fields')
<a href="{{ route('dateTimes.index') }}" class="btn btn-default">
    @lang('crud.back')
</a>
@endsection
