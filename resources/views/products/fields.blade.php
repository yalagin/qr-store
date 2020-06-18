<!-- Article Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('article_number', __('models/products.fields.article_number').':') !!}
    {!! Form::text('article_number', null, ['class' => 'form-control','rows'=>"3","id"=> "kt_autosize_1"]) !!}
</div>
<!-- dont forget to add <script src="/js/pages/crud/forms/widgets/autosize.js"></script> -->


<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/products.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Main Description Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('main_description', __('models/products.fields.main_description').':') !!}
    {!! Form::textarea('main_description', null, ['class' => 'form-control','rows'=>"3","id"=> "kt_autosize_1"]) !!}
</div>

<!-- Additional Description Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('additional_description', __('models/products.fields.additional_description').':') !!}
    {!! Form::textarea('additional_description', null, ['class' => 'form-control','rows'=>"3","id"=> "kt_autosize_1"]) !!}
</div>

<!-- Minor Description Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('minor_description', __('models/products.fields.minor_description').':') !!}
    {!! Form::textarea('minor_description', null, ['class' => 'form-control','rows'=>"3","id"=> "kt_autosize_1"]) !!}
</div>

<!-- 'bootstrap / Toggle Switch Main Product Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('main_product', __('models/products.fields.main_product').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('main_product', 0) !!}
        {!! Form::checkbox('main_product', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', __('models/products.fields.price').':') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Vat Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vat_code', __('models/products.fields.vat_code').':') !!}
    {!! Form::number('vat_code', null, ['class' => 'form-control']) !!}
</div>

<!-- 'bootstrap / Toggle Switch Active Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('active', __('models/products.fields.active').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('active', 0) !!}
        {!! Form::checkbox('active', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- 'bootstrap / Toggle Switch Sold Out Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('sold_out', __('models/products.fields.sold_out').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('sold_out', 0) !!}
        {!! Form::checkbox('sold_out', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Ean Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ean', __('models/products.fields.ean').':') !!}
    {!! Form::text('ean', null, ['class' => 'form-control', "id"=>"kt_maxlength_1", "maxlength"=>"13"]) !!}
</div>

<!-- 'bootstrap / Toggle Switch Is Receipt Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('is_receipt', __('models/products.fields.is_receipt').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_receipt', 0) !!}
        {!! Form::checkbox('is_receipt', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- 'bootstrap / Toggle Switch Is Kitchen Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('is_kitchen', __('models/products.fields.is_kitchen').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_kitchen', 0) !!}
        {!! Form::checkbox('is_kitchen', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- 'bootstrap / Toggle Switch Is Sticker Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('is_sticker', __('models/products.fields.is_sticker').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_sticker', 0) !!}
        {!! Form::checkbox('is_sticker', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- 'bootstrap / Toggle Switch Is Deal Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('is_deal', __('models/products.fields.is_deal').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_deal', 0) !!}
        {!! Form::checkbox('is_deal', 1, null,  ['data-toggle' => 'toggle']) !!}
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
                        <img data-dz-thumbnail />
                        <div class="dropzone-error" data-dz-errormessage=""></div>
                    </div>
                    <div class="dropzone-progress">
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress=""></div>
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
        @include('products.existed_images')
        <span class="form-text text-muted">Max file size is 1MB and max number of files is 5.</span>
    </div>
</div>

@if($categories && ! $categories->isEmpty())
    <div class="form-group   col-sm-6">
        {{Form::label('products', 'Select/deselect Categories',['class'=>'col-form-label text-left '])}}
        <label>
            <select  class="form-control selectpicker" multiple="multiple" data-actions-box="true" name="categories[]">
                @foreach($categories as $category)
                    <option value="{{$category->id}}"
                            @if(isset($products) && in_array($category->id, $products->categories->map(function ($item) {return $item->id;})->toArray()))
                            selected="selected"
                        @endif
                    >
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
        </label>
    </div>
@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('products.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>

@push('scripts')
    <script>const uploadUrl = "{{ route('api.images.store') }}";</script>
{{--    <script>const csrf_token = "{{ csrf_token()}}"</script>--}}
    <script src="/js/pages/crud/file-upload/dropzonejs.js"></script>
    <script src="/js/pages/crud/forms/widgets/bootstrap-maxlength.js"></script>
    <script src="/js/pages/crud/forms/widgets/autosize.js"></script>

@endpush
