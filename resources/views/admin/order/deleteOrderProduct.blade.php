<div class="modal fade" id="deleteOrderProduct" tabindex="-1" role="dialog" aria-labelledby="deleteOrderProductLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="deleteOrderProductLabel">{{ trans('labels.deleteOrder') }}</h4>
            </div>
            {!! Form::open(array('url' =>'admin/deleteOrderProduct', 'name'=>'deleteOrderProduct', 'id'=>'deleteOrderProduct', 'method'=>'post',
            'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
            {!! Form::hidden('action', 'delete_order_product', array('class'=>'form-control')) !!}
            {!! Form::hidden('order_id', '' , array('class'=>'form-control', 'id'=>'delete_order_id')) !!}
            {!! Form::hidden('order_product_id', '' , array('class'=>'form-control', 'id'=>'order_product_id')) !!}
            <div class="modal-body">
                <p>{{ trans('labels.deleteOrderProductText') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Cancel') }}</button>
                <button type="submit" class="btn btn-primary" id="deleteOrder">{{ trans('labels.Delete') }}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>