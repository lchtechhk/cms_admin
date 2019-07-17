<div class="modal fade" id="deleteProductOptionValueModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductOptionValueModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="deleteProductOptionValueModalLabel">{{ trans('labels.ProductOptionValue') }}</h4>
            </div>
            {!! Form::open(array('url' => array('admin/deleteProductOptionValue'), 'name'=>'deleteProductOptionValue', 'id'=>'deleteProductOptionValue', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
                {!! Form::text('product_option_value_id',  '', array('class'=>'form-control', 'id'=>'product_option_value_id','name'=>'product_option_value_id')) !!}
                <div class="modal-body">
                    <p>{{ trans('labels.ProductOptionValueText') }}</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Cancel') }}</button>
                        <button type="submit" class="btn btn-primary" id="deleteProductOptionValueBtn">{{ trans('labels.Delete') }}</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>