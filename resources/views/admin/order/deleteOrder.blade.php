<div class="modal fade" id="deleteOderModal" tabindex="-1" role="dialog" aria-labelledby="deleteOderModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="deleteOderModalLabel">{{ trans('labels.deleteOder') }}</h4>
                </div>
                {!! Form::open(array('url' =>'admin/deleteOrder', 'name'=>'deleteOder', 'id'=>'deleteOder', 'method'=>'post',
                'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
                {!! Form::hidden('action', 'delete', array('class'=>'form-control')) !!}
                {!! Form::hidden('order_id', '' , array('class'=>'form-control', 'id'=>'order_id')) !!}
                <div class="modal-body">
                    <p>{{ trans('labels.deleteOderText') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Cancel') }}</button>
                    <button type="submit" class="btn btn-primary" id="deleteOder">{{ trans('labels.Delete') }}</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>