<div class="modal fade" id="deleteStaffModal" tabindex="-1" role="dialog" aria-labelledby="deleteStaffModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="deleteStaffModalLabel">{{ trans('labels.deleteStaff') }}</h4>
        </div>
        {!! Form::open(array('url' =>'admin/deleteStaff', 'name'=>'deleteStaff', 'id'=>'deleteStaff', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
                {!! Form::hidden('action',  'delete', array('class'=>'form-control')) !!}
                {!! Form::text('staff_id',  '', array('class'=>'form-control', 'id'=>'delete_staff_id')) !!}
        <div class="modal-body">                        
            <p>{{ trans('labels.deleteStaffText') }}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Close') }}</button>
          <button type="submit" class="btn btn-primary">{{ trans('labels.deleteStaff') }}</button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>