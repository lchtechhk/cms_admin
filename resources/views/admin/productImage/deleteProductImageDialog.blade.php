<div class="modal fade" id="deleteProductImageModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductImageModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="deleteProductImageModalLabel">{{ trans('labels.deleteProductImage') }}</h4>
            </div>
            {!! Form::open(array('url' => array('admin/deleteProductImage'), 'name'=>'deleteProductImage', 'id'=>'deleteProductImage', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
                {!! Form::text('delete_product_id',  '', array('class'=>'form-control', 'id'=>'delete_product_id','name'=>'product_id')) !!}
                {!! Form::text('delete_product_image_id',  '', array('class'=>'form-control', 'id'=>'delete_product_image_id','name'=>'product_image_id')) !!}
                <div class="modal-body">
                    <p>{{ trans('labels.deleteProductImageText') }}</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"
                        >{{ trans('labels.Cancel') }}</button>
                        <button type="submit" class="btn btn-primary" id="deleteProductImageBtn">{{ trans('labels.Delete') }}</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>