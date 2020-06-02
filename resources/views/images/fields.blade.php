<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_url', 'Image Url:') !!}
    <label class="image__file-upload"> Choose
        {!! Form::file('image_url',['class'=>'d-none']) !!}
    </label>
</div>
<div class="clearfix"></div>

<!-- Categories Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('categories_id', 'Categories Id:') !!}
    {!! Form::text('categories_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Products Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('products_id', 'Products Id:') !!}
    {!! Form::text('products_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('images.index') }}" class="btn btn-secondary">Cancel</a>
</div>
