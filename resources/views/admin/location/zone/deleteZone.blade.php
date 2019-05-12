<div class="modal fade" id="deleteZoneModal" tabindex="-1" role="dialog" aria-labelledby="deleteZoneModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="deleteZoneModalLabel">{{ trans('labels.DeleteZone') }}</h4>
            </div>
            {!! Form::open(array('url' =>'admin/deleteZone', 'name'=>'deleteZone', 'id'=>'deleteZone', 'method'=>'post',
            'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
            {!! Form::hidden('action', 'delete', array('class'=>'form-control')) !!}
            {!! Form::hidden('id', '', array('class'=>'form-control', 'id'=>'zone_id')) !!}
            <div class="modal-body">
                <p>{{ trans('labels.DeleteZoneText') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Cancel') }}</button>
                <button type="submit" class="btn btn-primary" id="deleteZone">{{ trans('labels.Delete') }}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>