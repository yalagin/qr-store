@extends('layout.card')

@section('card')
    @include('flash::message')
    @include('date_times.table')
@endsection


@push('page_toolbar_right')
    <a class="btn btn-light-primary font-weight-bold py-2 px-5 ml-2" href="{{ route('dateTimes.create') }}">@lang('crud.add_new')</a>
 @endpush
