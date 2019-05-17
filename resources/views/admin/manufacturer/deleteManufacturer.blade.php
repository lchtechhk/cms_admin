<div class="modal fade" id="deleteManufacturerModal" tabindex="-1" role="dialog" aria-labelledby="deleteManufacturerModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="deleteManufacturerModalLabel">{{ trans('labels.deleteManufacturer') }}</h4>
            </div>
            {!! Form::open(array('url' =>'admin/deleteManufacturer', 'name'=>'deleteManufacturer', 'id'=>'deleteManufacturer', 'method'=>'post',
            'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
            {!! Form::hidden('action', 'delete', array('class'=>'form-control')) !!}
            {!! Form::hidden('manufacturer_id', '' , array('class'=>'form-control', 'id'=>'manufacturer_id')) !!}
            <div class="modal-body">
                <p>{{ trans('labels.deleteManufacturerText') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Cancel') }}</button>
                <button type="submit" class="btn btn-primary" id="deleteManufacturer">{{ trans('labels.Delete') }}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>