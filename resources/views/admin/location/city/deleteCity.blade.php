<div class="modal fade" id="deleteCityModal" tabindex="-1" role="dialog" aria-labelledby="deleteCityModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="deleteCityModalLabel">{{ trans('labels.DeleteCity') }}</h4>
            </div>
            {!! Form::open(array('url' =>'admin/deleteCity', 'name'=>'deleteCity', 'id'=>'deleteCity', 'method'=>'post',
            'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
            {!! Form::hidden('action', 'delete', array('class'=>'form-control')) !!}
            {!! Form::hidden('id', '' , array('class'=>'form-control', 'id'=>'cities_id')) !!}
            <div class="modal-body">
                <p>{{ trans('labels.DeleteCityText') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Cancel') }}</button>
                <button type="submit" class="btn btn-primary" id="deleteCity">{{ trans('labels.Delete') }}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>