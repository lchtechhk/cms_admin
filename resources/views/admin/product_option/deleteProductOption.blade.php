<div class="modal fade" id="deleteProductOptionModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductOptionModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="deleteProductOptionModalLabel">{{ trans('labels.ProductOption') }}</h4>
            </div>
            {!! Form::open(array('url' => array('admin/deleteProductOption'), 'name'=>'deleteProductOption', 'id'=>'deleteProductOption', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
                {!! Form::text('product_option_id',  '', array('class'=>'form-control', 'id'=>'product_option_id','name'=>'product_option_id')) !!}
                <div class="modal-body">
                    <p>{{ trans('labels.ProductOptionText') }}</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Cancel') }}</button>
                        <button type="submit" class="btn btn-primary" id="deleteProductOptionBtn">{{ trans('labels.Delete') }}</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>