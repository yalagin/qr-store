<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6 ">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control','rows'=>"3","id"=> "kt_autosize_1"]) !!}
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

<div class="form-group row col-sm-6">
    <label class="col-lg-3 col-form-label text-lg-right">Upload Images:</label>
    <div class="col-lg-9">
        <div class="dropzone dropzone-multi" id="kt_dropzone_5">
            <div class="dropzone-panel mb-lg-0 mb-2">
                <a class="dropzone-select btn btn-light-primary font-weight-bold btn-sm">Attach files</a>
            </div>
            <div class="dropzone-items">
                <div class="dropzone-item" style="display:none">
                    <div class="dropzone-file">
                        <div class="dropzone-filename" title="some_image_file_name.jpg">
                            <span data-dz-name="">some_image_file_name.jpg</span>
                            <strong>(
                                <span data-dz-size="">340kb</span>)</strong>
                        </div>
                        <img data-dz-thumbnail/>
                        <div class="dropzone-error" data-dz-errormessage=""></div>
                    </div>
                    <div class="dropzone-progress">
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" aria-valuemin="0"
                                 aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress=""></div>
                        </div>
                    </div>
                    <div class="dropzone-toolbar">
                        <span class="dropzone-delete" data-dz-remove="">
                            <i class="flaticon2-cross"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <span class="form-text text-muted">Max file size is 1MB and max number of files is 5.</span>
        @include('categories.existed_images')
    </div>
</div>


@isset ($products)
    <div class="form-group row  col-sm-9">
        <label class="col-form-label text-right col-lg-3 col-sm-12">Select/deselect Products</label>
        <div class="col-lg-4 col-md-9 col-sm-12">
            <select class="form-control selectpicker" multiple="multiple" data-actions-box="true" name="products[]">
                @foreach ($products as $product)
                    <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

@endisset


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
</div>


@section('scripts')
    <script>const uploadUrl = "{{ route('api.images.store') }}";</script>
    <script>const csrf_token = "{{ csrf_token()}}"</script>
    <script src="/js/pages/crud/file-upload/dropzonejs.js"></script>
    <script src="/js/pages/crud/forms/widgets/bootstrap-select.js"></script>
    <script src="/js/pages/crud/forms/widgets/autosize.js"></script>
@endsection
