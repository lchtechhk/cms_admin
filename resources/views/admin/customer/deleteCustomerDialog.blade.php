<div class="modal fade" id="deleteCustomerModal" tabindex="-1" role="dialog" aria-labelledby="deleteCustomerModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="deleteCustomerModalLabel">{{ trans('labels.DeleteCustomer') }}</h4>
        </div>
        {!! Form::open(array('url' =>'admin/deleteCustomer', 'name'=>'deleteCustomer', 'id'=>'deleteCustomer', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
                {!! Form::hidden('action',  'delete', array('class'=>'form-control')) !!}
                {!! Form::text('id',  '', array('class'=>'form-control', 'id'=>'delete_customer_id', 'name'=>'id')) !!}
        <div class="modal-body">                        
            <p>{{ trans('labels.DeleteCustomerText') }}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Close') }}</button>
          <button type="submit" class="btn btn-primary">{{ trans('labels.DeleteCustomer') }}</button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>