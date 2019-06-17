@include('generic/view_function')
{{-- AddProductImageModel--}}
{{-- <div class="modal fade" id="addressDialog" tabindex="-1" role="dialog" aria-labelledby="addressLabel"> --}}
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="productImageLabel">{{ trans('labels.AddProductImage') }}</h4>
        </div>

        @if ($result['operation'] == 'listing' || $result['operation'] == 'view_add' )
            {!! Form::open(array('url' => array('admin/addProductImage'),
            'name'=>'addProductImageFrom', 'id'=>'addProductImageFrom', 'method'=>'post', 'class' => 'form-horizontal',
            'enctype'=>'multipart/form-data')) !!}
        @elseif ($result['operation'] == 'view_edit')
            {!! Form::open(array('url' => array('admin/updateProductImage'),
            'name'=>'editProductImageFrom', 'id'=>'editProductImageFrom', 'method'=>'post', 'class' => 'form-horizontal',
            'enctype'=>'multipart/form-data')) !!}
        @endif
        {!! Form::text('product_id', empty($result['product_id']) ? '' : print_value($result['operation'],$result['product_id']), array('class'=>'form-control', 'id'=>'product_id')) !!}
        {!! Form::text('product_image_id', empty($result['product_image_id']) ? '' : print_value($result['operation'],$result['product_image_id']), array('class'=>'form-control', 'id'=>'product_image_id')) !!}    
        <div class="modal-body">
                <div class="form-group">
                    <label for="name" class="col-sm-2 col-md-4 control-label">{{ trans('labels.Image') }}</label>
                    <div class="col-sm-10 col-md-8">
                        {!! Form::file('image', array('id'=>'image')) !!}
                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                        {{ trans('labels.UploadAdditionalImageText') }}</span>
                        <br>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 col-md-4 control-label">{{ trans('labels.Description') }}
                    </label>
                    <div class="col-sm-10 col-md-8">
                        {!! Form::textarea('description',
                        empty($result['product_image']->description) ? '' : print_value($result['operation'],$result['product_image']->description),
                        array('class'=>'form-control','id'=>'description', 'colspan'=>'3' )) !!}
                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                            {{ trans('labels.ImageDescription') }}
                        </span>
                    </div>
                </div>
                <div class="alert alert-danger addError" style="display: none; margin-bottom: 0;" role="alert">
                    <i class="icon fa fa-ban"></i>
                    {{ trans('labels.ChooseImageText') }}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Close') }}</button>
                @if ($result['operation'] == 'listing' || $result['operation'] == 'view_add' )
                    <button type="submit" class="btn btn-primary"
                        id="AddProductImage">{{ trans('labels.AddProductImage') }}
                    </button>
                    @elseif ($result['operation'] == 'view_edit')
                    <button type="submit" class="btn btn-primary"
                        id="EditProductImage">{{ trans('labels.EditProductImage') }}
                    </button>
                @endif
            </div>
        {!! Form::close() !!}
    </div>
</div>
{{-- </div> --}}