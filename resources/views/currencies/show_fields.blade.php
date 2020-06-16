<!-- Currency Symbol Field -->
<div class="form-group">
    {!! Form::label('currency_symbol', __('models/currencies.fields.currency_symbol').':') !!}
    <p>{{ $currency->currency_symbol }}</p>
</div>

<!-- Position Of Symbol Field -->
<div class="form-group">
    {!! Form::label('position_of_symbol', __('models/currencies.fields.position_of_symbol').':') !!}
    <p>{{ $currency->position_of_symbol }}</p>
</div>

<!-- Decimal Symbol Field -->
<div class="form-group">
    {!! Form::label('decimal_symbol', __('models/currencies.fields.decimal_symbol').':') !!}
    <p>{{ $currency->decimal_symbol }}</p>
</div>

<!-- Decimal Digits Field -->
<div class="form-group">
    {!! Form::label('decimal_digits', __('models/currencies.fields.decimal_digits').':') !!}
    <p>{{ $currency->decimal_digits }}</p>
</div>

<!-- Digital Grouping Symbol Field -->
<div class="form-group">
    {!! Form::label('digital_grouping_symbol', __('models/currencies.fields.digital_grouping_symbol').':') !!}
    <p>{{ $currency->digital_grouping_symbol }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/currencies.fields.created_at').':') !!}
    <p>{{ $currency->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/currencies.fields.updated_at').':') !!}
    <p>{{ $currency->updated_at }}</p>
</div>

