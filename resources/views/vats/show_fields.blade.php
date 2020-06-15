<!-- Code Field -->
<div class="form-group">
    {!! Form::label('code', __('models/vats.fields.code').':') !!}
    <p>{{ $vat->code }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('Description', __('models/vats.fields.Description').':') !!}
    <p>{{ $vat->Description }}</p>
</div>

<!-- Percentage Field -->
<div class="form-group">
    {!! Form::label('Percentage', __('models/vats.fields.Percentage').':') !!}
    <p>{{ $vat->Percentage }}</p>
</div>

<!-- Is Sales Field -->
<div class="form-group">
    {!! Form::label('is_sales', __('models/vats.fields.is_sales').':') !!}
    <p>{{ $vat->is_sales }}</p>
</div>

<!-- Is Purchase Field -->
<div class="form-group">
    {!! Form::label('is_purchase', __('models/vats.fields.is_purchase').':') !!}
    <p>{{ $vat->is_purchase }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/vats.fields.created_at').':') !!}
    <p>{{ $vat->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/vats.fields.updated_at').':') !!}
    <p>{{ $vat->updated_at }}</p>
</div>

