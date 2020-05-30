<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('active', 'Active:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('active', 0) !!}
        {!! Form::checkbox('active', '1', null) !!}
    </label>
</div>


<!-- Excluding Discounts Field -->
<div class="form-group col-sm-6">
    {!! Form::label('excluding_discounts', 'Excluding Discounts:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('excluding_discounts', 0) !!}
        {!! Form::checkbox('excluding_discounts', '1', null) !!}
    </label>
</div>


<!-- Product Remark Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_remark', 'Product Remark:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('product_remark', 0) !!}
        {!! Form::checkbox('product_remark', '1', null) !!}
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
</div>
