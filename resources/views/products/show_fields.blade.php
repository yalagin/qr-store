<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $products->name }}</p>
</div>

<!-- Main Description Field -->
<div class="form-group">
    {!! Form::label('main_description', 'Main Description:') !!}
    <p>{{ $products->main_description }}</p>
</div>

<!-- Additional Description Field -->
<div class="form-group">
    {!! Form::label('additional_description', 'Additional Description:') !!}
    <p>{{ $products->additional_description }}</p>
</div>

<!-- Minor Description Field -->
<div class="form-group">
    {!! Form::label('minor_description', 'Minor Description:') !!}
    <p>{{ $products->minor_description }}</p>
</div>

<!-- Main Product Field -->
<div class="form-group">
    {!! Form::label('main_product', 'Main Product:') !!}
    <p>{{ $products->main_product }}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $products->price }}</p>
</div>

<!-- Vat Code Field -->
<div class="form-group">
    {!! Form::label('vat_code', 'Vat Code:') !!}
    <p>{{ $products->vat_code }}</p>
</div>

<!-- Active Field -->
<div class="form-group">
    {!! Form::label('active', 'Active:') !!}
    <p>{{ $products->active }}</p>
</div>

<!-- Sold Out Field -->
<div class="form-group">
    {!! Form::label('sold_out', 'Sold Out:') !!}
    <p>{{ $products->sold_out }}</p>
</div>

<!-- Ean Field -->
<div class="form-group">
    {!! Form::label('ean', 'Ean:') !!}
    <p>{{ $products->ean }}</p>
</div>

<!-- Is Receipt Field -->
<div class="form-group">
    {!! Form::label('is_receipt', 'Is Receipt:') !!}
    <p>{{ $products->is_receipt }}</p>
</div>

<!-- Is Kitchen Field -->
<div class="form-group">
    {!! Form::label('is_kitchen', 'Is Kitchen:') !!}
    <p>{{ $products->is_kitchen }}</p>
</div>

<!-- Is Sticker Field -->
<div class="form-group">
    {!! Form::label('is_sticker', 'Is Sticker:') !!}
    <p>{{ $products->is_sticker }}</p>
</div>

<!-- Is Deal Field -->
<div class="form-group">
    {!! Form::label('is_deal', 'Is Deal:') !!}
    <p>{{ $products->is_deal }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $products->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $products->updated_at }}</p>
</div>

