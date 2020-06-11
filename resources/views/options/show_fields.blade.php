<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/options.fields.name').':') !!}
    <p>{{ $options->name }}</p>
</div>

<!-- Input Type Field -->
<div class="form-group">
    {!! Form::label('input_type', __('models/options.fields.input_type').':') !!}
    <p>{{ $options->input_type }}</p>
</div>

<!-- Min Field -->
<div class="form-group">
    {!! Form::label('min', __('models/options.fields.min').':') !!}
    <p>{{ $options->min }}</p>
</div>

<!-- Max Field -->
<div class="form-group">
    {!! Form::label('max', __('models/options.fields.max').':') !!}
    <p>{{ $options->max }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/options.fields.created_at').':') !!}
    <p>{{ $options->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/options.fields.updated_at').':') !!}
    <p>{{ $options->updated_at }}</p>
</div>

