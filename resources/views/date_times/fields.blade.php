<!-- Short Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('short_date', __('models/date_times.fields.short_date').':') !!}
    {!! Form::select('short_date', ['dd.MM.yyyy' => 'dd.MM.yyyy', 'dd.MM.yy' => 'dd.MM.yy', 'd.M.yy' => 'd.M.yy', 'dd-MM-yyyy' => 'dd-MM-yyyy', 'dd/MM/yy' => 'dd/MM/yy'], null, ['class' => 'form-control']) !!}
</div>

<!-- Long Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('long_date', __('models/date_times.fields.long_date').':') !!}
    {!! Form::select('long_date', ['d MMMM yyyy' => 'd MMMM yyyy','dd MMMM yyyy' => 'dd MMMM yyyy','dddd, d MMMMM yyyy' => 'dddd, d MMMMM yyyy',], null, ['class' => 'form-control']) !!}
</div>

<!-- Short Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('short_time', __('models/date_times.fields.short_time').':') !!}
    {!! Form::select('short_time', ['H:mm' => 'H:mm', 'HH:mm' => 'HH:mm'], null, ['class' => 'form-control']) !!}
</div>

<!-- Long Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('long_time', __('models/date_times.fields.long_time').':') !!}
    {!! Form::select('long_time', ['H:mm:ss' => 'H:mm:ss', 'HH:mm:ss' => 'HH:mm:ss'], null, ['class' => 'form-control']) !!}
</div>

<!-- First Day Of Week Field -->
<div class="form-group col-sm-6">
    {!! Form::label('first_day_of_week', __('models/date_times.fields.first_day_of_week').':') !!}
    {!! Form::select('first_day_of_week', ['Monday' => 'Monday', 'Tuesday' => 'Tuesday', 'Wednesday' => 'Wednesday', 'Thursday' => 'Thursday', 'Friday' => 'Friday', 'Saturday' => 'Saturday', 'Sunday' => 'Sunday'], null, ['class' => 'form-control']) !!}
</div>

<!-- Time Format Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time_format', __('models/date_times.fields.time_format').':') !!}
    {!! Form::select('time_format', ['12' => '12', '24' => '24'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('dateTimes.index') }}" class="btn btn-secondary">@lang('crud.cancel')</a>
</div>
