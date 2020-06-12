<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/categories.fields.name').':') !!}
    <p>{{ $categories->name }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', __('models/categories.fields.description').':') !!}
    <p>{{ $categories->description }}</p>
</div>

<!-- Active Field -->
<div class="form-group">
    {!! Form::label('active', __('models/categories.fields.active').':') !!}
    <p>{{ $categories->active }}</p>
</div>

<!-- Excluding Discounts Field -->
<div class="form-group">
    {!! Form::label('excluding_discounts', __('models/categories.fields.excluding_discounts').':') !!}
    <p>{{ $categories->excluding_discounts }}</p>
</div>

<!-- Product Remark Field -->
<div class="form-group">
    {!! Form::label('product_remark', __('models/categories.fields.product_remark').':') !!}
    <p>{{ $categories->product_remark }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/categories.fields.created_at').':') !!}
    <p>{{ $categories->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/categories.fields.updated_at').':') !!}
    <p>{{ $categories->updated_at }}</p>
</div>

