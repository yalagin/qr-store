<!-- Currency Symbol Field -->
<div class="form-group col-sm-6">
    {!! Form::label('currency_symbol', __('models/currencies.fields.currency_symbol').':') !!}
    <select name="currency_symbol" id="currency_symbol" class="form-control">
        @foreach($currencies as $value)
            <option class="transform-to-symbol" value={{$value}}
                @if( isset($currency) && $value==$currency->currency_symbol)
                    selected
                @endif
            >{{$value}}</option>
        @endforeach
    </select>
</div>

<!-- Position Of Symbol Field -->
<div class="form-group col-sm-6">
    {!! Form::label('position_of_symbol', __('models/currencies.fields.position_of_symbol').':') !!}
    {!! Form::select('position_of_symbol',
        [
        'left-with-space' => 'left with space',
        'left' => 'left',
        'right-with-space' => 'right with space',
        'right' => 'right',
        ],
    null, ['class' => 'form-control']) !!}
</div>

<!-- Decimal Symbol Field -->
<div class="form-group col-sm-6">
    {!! Form::label('decimal_symbol', __('models/currencies.fields.decimal_symbol').':') !!}
    {!! Form::select('decimal_symbol',[
        'comma' => ',',
        'dot' => '.',
        'space' => ' ',
        'apostrophe' => '\'',
        ], null, ['class' => 'form-control']) !!}
</div>

<!-- Decimal Digits Field -->
<div class="form-group col-sm-6">
    {!! Form::label('decimal_digits', __('models/currencies.fields.decimal_digits').':') !!}
    {!! Form::select('decimal_digits', range(0, 10),
isset($currency) ?$currency->decimal_digits : 2

, ['class' => 'form-control']) !!}
</div>

<!-- Digital Grouping Symbol Field -->
<div class="form-group col-sm-6">
    {!! Form::label('digital_grouping_symbol', __('models/currencies.fields.digital_grouping_symbol').':') !!}
    {!! Form::select('digital_grouping_symbol',  [
        'space' => ' ',
        'comma' => ',',
        'dot' => '.',
        'apostrophe' => '\'',
        ], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('currencies.index') }}" class="btn btn-secondary">@lang('crud.cancel')</a>
</div>

@push('scripts')
    <script>
        $(document).ready(function(){
            $("#currency_symbol option").each(function()
            {
                $(this).text($(this).text().trim() +" / "+getSymbolFromCurrency($(this).text().trim())??"");
            });
        });
    </script>
@endpush
