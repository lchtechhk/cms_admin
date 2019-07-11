<div class="modal fade" id="deleteProductAttributeModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductAttributeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="deleteProductAttributeModalLabel">{{ trans('labels.ProductAttribute') }}</h4>
            </div>
            {!! Form::open(array('url' => array('admin/deleteProductAttribute1'), 'name'=>'deleteProductAttributeForm', 'id'=>'deleteProductAttributeForm', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
                {!! Form::text('delete_product_id',  '', array('class'=>'form-control', 'id'=>'delete_product_id','name'=>'delete_product_id')) !!} 
                {!! Form::text('delete_product_attribute_id',  '', array('class'=>'form-control', 'id'=>'delete_product_attribute_id','name'=>'delete_product_attribute_id')) !!}
                <div class="modal-body">
                    <p>{{ trans('labels.ProductAttributeText') }}</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Cancel') }}</button>
                        <button type="submit" class="btn btn-primary" id="deleteProductAttributeBtn">{{ trans('labels.Delete') }}</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>