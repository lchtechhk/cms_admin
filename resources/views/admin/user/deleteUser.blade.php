<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="deleteUserModalLabel">{{ trans('labels.deleteUser') }}</h4>
        </div>
        {!! Form::open(array('url' =>'admin/deleteUser', 'name'=>'deleteUser', 'id'=>'deleteUser', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
                {!! Form::hidden('action',  'delete', array('class'=>'form-control')) !!}
                {!! Form::text('user_id',  '', array('class'=>'form-control', 'id'=>'delete_user_id')) !!}
        <div class="modal-body">                        
            <p>{{ trans('labels.deleteUserText') }}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Close') }}</button>
          <button type="submit" class="btn btn-primary">{{ trans('labels.deleteUser') }}</button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>