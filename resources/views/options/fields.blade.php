<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/options.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Input Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('input_type', __('models/options.fields.input_type').':') !!}
    {!! Form::select('input_type', ['check-box' => 'check-box', 'radio-button' => 'radio-button', 'drop-down' => 'drop-down'], null, ['class' => 'form-control']) !!}
</div>

<!-- Min Field -->
<div class="form-group col-sm-6">
    {!! Form::label('min', __('models/options.fields.min').':') !!}
    {!! Form::number('min', null, ['class' => 'form-control']) !!}
</div>

<!-- Max Field -->
<div class="form-group col-sm-6">
    {!! Form::label('max', __('models/options.fields.max').':') !!}
    {!! Form::number('max', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('options.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
