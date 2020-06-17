<!-- Short Date Field -->
<div class="form-group">
    {!! Form::label('short_date', __('models/date_times.fields.short_date').':') !!}
    <p>{{ $dateTime->short_date }}</p>
</div>

<!-- Long Date Field -->
<div class="form-group">
    {!! Form::label('long_date', __('models/date_times.fields.long_date').':') !!}
    <p>{{ $dateTime->long_date }}</p>
</div>

<!-- Short Time Field -->
<div class="form-group">
    {!! Form::label('short_time', __('models/date_times.fields.short_time').':') !!}
    <p>{{ $dateTime->short_time }}</p>
</div>

<!-- Long Time Field -->
<div class="form-group">
    {!! Form::label('long_time', __('models/date_times.fields.long_time').':') !!}
    <p>{{ $dateTime->long_time }}</p>
</div>

<!-- First Day Of Week Field -->
<div class="form-group">
    {!! Form::label('first_day_of_week', __('models/date_times.fields.first_day_of_week').':') !!}
    <p>{{ $dateTime->first_day_of_week }}</p>
</div>

<!-- Time Format Field -->
<div class="form-group">
    {!! Form::label('time_format', __('models/date_times.fields.time_format').':') !!}
    <p>{{ $dateTime->time_format }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/date_times.fields.created_at').':') !!}
    <p>{{ $dateTime->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/date_times.fields.updated_at').':') !!}
    <p>{{ $dateTime->updated_at }}</p>
</div>

