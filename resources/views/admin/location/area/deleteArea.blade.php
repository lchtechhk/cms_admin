<div class="modal fade" id="deleteAreaModal" tabindex="-1" role="dialog" aria-labelledby="deleteAreaModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="deleteAreaModalLabel">{{ trans('labels.deleteArea') }}</h4>
            </div>
            {!! Form::open(array('url' =>'admin/deleteArea', 'name'=>'deleteArea', 'id'=>'deleteArea', 'method'=>'post',
            'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
            {!! Form::hidden('action', 'delete', array('class'=>'form-control')) !!}
            {!! Form::hidden('id', '' , array('class'=>'form-control', 'id'=>'area_id')) !!}
            <div class="modal-body">
                <p>{{ trans('labels.deleteAreaText') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Cancel') }}</button>
                <button type="submit" class="btn btn-primary" id="deleteArea">{{ trans('labels.Delete') }}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>