<!-- Name Field -->
<div class="form-group" style="padding-left: 1rem">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $categories->name }}</p>
</div>

<!-- Description Field -->
<div class="form-group" style="padding-left: 1rem">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $categories->description }}</p>
</div>

<!-- Active Field -->
<div class="form-group" style="padding-left: 1rem">
    {!! Form::label('active', 'Active:') !!}
    <p>{{ $categories->active }}</p>
</div>

<!-- Excluding Discounts Field -->
<div class="form-group" style="padding-left: 1rem">
    {!! Form::label('excluding_discounts', 'Excluding Discounts:') !!}
    <p>{{ $categories->excluding_discounts }}</p>
</div>

<!-- Product Remark Field -->
<div class="form-group" style="padding-left: 1rem">
    {!! Form::label('product_remark', 'Product Remark:') !!}
    <p>{{ $categories->product_remark }}</p>
</div>

{{--<!-- Created At Field -->--}}
{{--<div class="form-group">--}}
{{--    {!! Form::label('created_at', 'Created At:') !!}--}}
{{--    <p>{{ $categories->created_at }}</p>--}}
{{--</div>--}}

{{--<!-- Updated At Field -->--}}
{{--<div class="form-group">--}}
{{--    {!! Form::label('updated_at', 'Updated At:') !!}--}}
{{--    <p>{{ $categories->updated_at }}</p>--}}
{{--</div>--}}

