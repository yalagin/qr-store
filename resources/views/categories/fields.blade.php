<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/categories.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('description', __('models/categories.fields.description').':') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control','rows'=>"3","id"=> "kt_autosize_1"]) !!}
</div>

<!-- Active Field -->
<div class="form-group col-sm-6">
    {!! Form::label('active', __('models/categories.fields.active').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('active', 0) !!}
        {!! Form::checkbox('active', '1', null) !!}
    </label>
</div>

<!-- Excluding Discounts Field -->
<div class="form-group col-sm-6">
    {!! Form::label('excluding_discounts', __('models/categories.fields.excluding_discounts').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('excluding_discounts', 0) !!}
        {!! Form::checkbox('excluding_discounts', '1', null) !!}
    </label>
</div>

<!-- Product Remark Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_remark', __('models/categories.fields.product_remark').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('product_remark', 0) !!}
        {!! Form::checkbox('product_remark', '1', null) !!}
    </label>
</div>

<div class="form-group row col-sm-6">
    <label class="col-lg-3 col-form-label text-lg-left">Upload Images:</label>
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
        @include('categories.existed_images')
        <span class="form-text text-muted">Max file size is 1MB and max number of files is 5.</span>
    </div>
</div>

@if(! $products->isEmpty())
    <div class="form-group row  col-sm-9">
        {{Form::label('products', 'Select/deselect Products',['class'=>'col-form-label text-right '])}}
            <label>
                <select  class="form-control selectpicker" multiple="multiple" data-actions-box="true" name="products[]">
                    @foreach($products as $product)
                        <option value="{{$product->id}}"
                                @if(isset($categories) && in_array($product->id, $categories->products->map(function ($item) {return $item->id;})->toArray()))
                                    selected="selected"
                                @endif
                        >
                            {{$product->name}}
                        </option>
                    @endforeach
                </select>
            </label>
    </div>
@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">@lang('crud.cancel')</a>
</div>

@section('scripts')
    <script>const uploadUrl = "{{ route('api.images.store') }}";</script>
    <script>const csrf_token = "{{ csrf_token()}}"</script>
    <script src="/js/pages/crud/file-upload/dropzonejs.js"></script>
    <script src="/js/pages/crud/forms/widgets/bootstrap-select.js"></script>
    <script src="/js/pages/crud/forms/widgets/autosize.js"></script>
@endsection
