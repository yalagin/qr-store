<!-- Article Number Field -->
<div class="form-group">
    {!! Form::label('article_number', __('models/products.fields.article_number').':') !!}
    <p>{{ $products->article_number }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/products.fields.name').':') !!}
    <p>{{ $products->name }}</p>
</div>

<!-- Main Description Field -->
<div class="form-group">
    {!! Form::label('main_description', __('models/products.fields.main_description').':') !!}
    <p>{{ $products->main_description }}</p>
</div>

<!-- Additional Description Field -->
<div class="form-group">
    {!! Form::label('additional_description', __('models/products.fields.additional_description').':') !!}
    <p>{{ $products->additional_description }}</p>
</div>

<!-- Minor Description Field -->
<div class="form-group">
    {!! Form::label('minor_description', __('models/products.fields.minor_description').':') !!}
    <p>{{ $products->minor_description }}</p>
</div>

<!-- Main Product Field -->
<div class="form-group">
    {!! Form::label('main_product', __('models/products.fields.main_product').':') !!}
    <p>{{ $products->main_product }}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', __('models/products.fields.price').':') !!}
    <p>{{ $products->price }}</p>
</div>

<!-- Vat Code Field -->
@if($products->vat)
<div class="form-group">
    {!! Form::label('vat_code', __('models/products.fields.vat_code').':') !!}
    <p>{{ $products->vat->code?? ""}}</p>
</div>
@endif
<!-- Active Field -->
<div class="form-group">
    {!! Form::label('active', __('models/products.fields.active').':') !!}
    <p>{{ $products->active }}</p>
</div>

<!-- Sold Out Field -->
<div class="form-group">
    {!! Form::label('sold_out', __('models/products.fields.sold_out').':') !!}
    <p>{{ $products->sold_out }}</p>
</div>

<!-- Ean Field -->
<div class="form-group">
    {!! Form::label('ean', __('models/products.fields.ean').':') !!}
    <p>{{ $products->ean }}</p>
</div>

<!-- Is Receipt Field -->
<div class="form-group">
    {!! Form::label('is_receipt', __('models/products.fields.is_receipt').':') !!}
    <p>{{ $products->is_receipt }}</p>
</div>

<!-- Is Kitchen Field -->
<div class="form-group">
    {!! Form::label('is_kitchen', __('models/products.fields.is_kitchen').':') !!}
    <p>{{ $products->is_kitchen }}</p>
</div>

<!-- Is Sticker Field -->
<div class="form-group">
    {!! Form::label('is_sticker', __('models/products.fields.is_sticker').':') !!}
    <p>{{ $products->is_sticker }}</p>
</div>

<!-- Is Deal Field -->
<div class="form-group">
    {!! Form::label('is_deal', __('models/products.fields.is_deal').':') !!}
    <p>{{ $products->is_deal }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/products.fields.created_at').':') !!}
    <p>{{ $products->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/products.fields.updated_at').':') !!}
    <p>{{ $products->updated_at }}</p>
</div>

@if($products->categories())
    <div class="form-group">
        {!! Form::label('updated_at', __('models/categories.plural').':') !!}
        @foreach( $products->categories as $category)
        <p>{{ $category->name }}</p>
        @endforeach
    </div>
@endif
