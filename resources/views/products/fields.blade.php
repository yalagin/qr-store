<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Main Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('main_description', 'Main Description:') !!}
    {!! Form::textarea('main_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Additional Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('additional_description', 'Additional Description:') !!}
    {!! Form::textarea('additional_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Minor Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('minor_description', 'Minor Description:') !!}
    {!! Form::textarea('minor_description', null, ['class' => 'form-control']) !!}
</div>

<!-- 'bootstrap / Toggle Switch Main Product Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('main_product', 'Main Product:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('main_product', 0) !!}
        {!! Form::checkbox('main_product', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Vat Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vat_code', 'Vat Code:') !!}
    {!! Form::number('vat_code', null, ['class' => 'form-control']) !!}
</div>

<!-- 'bootstrap / Toggle Switch Active Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('active', 'Active:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('active', 0) !!}
        {!! Form::checkbox('active', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- 'bootstrap / Toggle Switch Sold Out Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('sold_out', 'Sold Out:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('sold_out', 0) !!}
        {!! Form::checkbox('sold_out', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- Ean Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ean', 'Ean:') !!}
    {!! Form::text('ean', null, ['class' => 'form-control']) !!}
</div>

<!-- 'bootstrap / Toggle Switch Is Receipt Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('is_receipt', 'Is Receipt:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_receipt', 0) !!}
        {!! Form::checkbox('is_receipt', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- 'bootstrap / Toggle Switch Is Kitchen Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('is_kitchen', 'Is Kitchen:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_kitchen', 0) !!}
        {!! Form::checkbox('is_kitchen', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- 'bootstrap / Toggle Switch Is Sticker Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('is_sticker', 'Is Sticker:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_sticker', 0) !!}
        {!! Form::checkbox('is_sticker', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>


<!-- 'bootstrap / Toggle Switch Is Deal Field' -->
<div class="form-group col-sm-6">
    {!! Form::label('is_deal', 'Is Deal:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_deal', 0) !!}
        {!! Form::checkbox('is_deal', 1, null,  ['data-toggle' => 'toggle']) !!}
    </label>
</div>

<div class="form-group row">
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
        <span class="form-text text-muted">Max file size is 1MB and max number of files is 5.</span>
        @include('products.existed_images')
    </div>
</div>




<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
</div>

@section('scripts')
    <script>const uploadUrl = "{{ route('api.images.store') }}";</script>
{{--    <script>const csrf_token = "{{ csrf_token()}}"</script>--}}
    <script src="/js/pages/crud/file-upload/dropzonejs.js"></script>
@endsection
