<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', __('models/vats.fields.code').':') !!}
    {!! Form::text('code', null, ['class' => 'form-control','rows'=>"3","id"=> "kt_autosize_1"]) !!}
</div>
<!-- dont forget to add <script src="/js/pages/crud/forms/widgets/autosize.js"></script> -->


<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Description', __('models/vats.fields.Description').':') !!}
    {!! Form::text('Description', null, ['class' => 'form-control','rows'=>"3","id"=> "kt_autosize_1"]) !!}
</div>
<!-- dont forget to add <script src="/js/pages/crud/forms/widgets/autosize.js"></script> -->


<!-- Percentage Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Percentage', __('models/vats.fields.Percentage').':') !!}
    {!! Form::text('Percentage', null, ['class' => 'form-control','rows'=>"3","id"=> "kt_autosize_1"]) !!}
</div>
<!-- dont forget to add <script src="/js/pages/crud/forms/widgets/autosize.js"></script> -->


<!-- Is Sales Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_sales', __('models/vats.fields.is_sales').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_sales', 0) !!}
        {!! Form::checkbox('is_sales', '1', null) !!}
    </label>
</div>

<!-- Is Purchase Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_purchase', __('models/vats.fields.is_purchase').':') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_purchase', 0) !!}
        {!! Form::checkbox('is_purchase', '1', null) !!}
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('vats.index') }}" class="btn btn-secondary">@lang('crud.cancel')</a>
</div>
