<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $image->name }}</p>
</div>

<!-- Image Url Field -->
<div class="form-group">
    {!! Form::label('image_url', 'Image Url:') !!}
    <p>{{ $image->image_url }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $image->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $image->updated_at }}</p>
</div>

<!-- Categories Id Field -->
<div class="form-group">
    {!! Form::label('categories_id', 'Categories Id:') !!}
    <p>{{ $image->categories_id }}</p>
</div>

<!-- Products Id Field -->
<div class="form-group">
    {!! Form::label('products_id', 'Products Id:') !!}
    <p>{{ $image->products_id }}</p>
</div>

