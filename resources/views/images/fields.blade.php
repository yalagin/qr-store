<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_url', 'Image Url:') !!}
    {!! Form::file('image_url') !!}
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('images.index') }}" class="btn btn-default">Cancel</a>
</div>
