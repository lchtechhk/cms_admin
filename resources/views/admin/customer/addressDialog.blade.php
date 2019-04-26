{{-- AddAddressModel--}}
<div class="modal fade" id="addressDialog" tabindex="-1" role="dialog" aria-labelledby="addressLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addressLabel">{{ trans('labels.AddAddress') }}</h4>
      </div>
      @if ($operation == 'add')
        {!! Form::open(array('url' =>'admin/addNewCustomerAddress', 'name'=>'addAddressFrom', 'id'=>'addAddressFrom', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
      @elseif ($operation == 'edit')
        {!! Form::open(array('url' =>'admin/editCustomerAddress', 'name'=>'editAddressFrom', 'id'=>'editAddressFrom', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
      @endif
      {!! Form::text('customer_id',  $result['address']['customer_id'] , array('class'=>'form-control', 'id'=>'customer_id')) !!}
      <div class="modal-body">    
          <div class="form-group">
              <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Company') }}</label>
              <div class="col-sm-10 col-md-8">
                {!! Form::text('company',  print_value($operation,$result['address']['company']), array('class'=>'form-control', 'id'=>'company')) !!}
              </div>
          </div>
          <div class="form-group">
              <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.FirstName') }}</label>
              <div class="col-sm-10 col-md-8">
                {!! Form::text('firstname',  print_value($operation,$result['address']['firstname']), array('class'=>'form-control', 'id'=>'firstname')) !!}
              </div>
          </div>
          <div class="form-group">
              <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.LastName') }}</label>
              <div class="col-sm-10 col-md-8">
                {!! Form::text('lastname',  print_value($operation,$result['address']['lastname']), array('class'=>'form-control', 'id'=>'lastname')) !!}
              </div>
          </div>                              
          <div class="form-group">
            <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Zone') }}</label>
            <div class="col-sm-10 col-md-8">
                <select id="zone_id" class="form-control" name="zone_id">    
                  <option value="">{{ trans('labels.SelectCountry') }}</option>
                  @foreach($result['address']['zones'] as $zone)
                    <option value="{{ $zone->zone_id }}" {{print_selected_value($operation,$zone->zone_id,$result['address']['zone_id'])}}>{{ $zone->zone_name }}</option>
                  @endforeach                                         
                </select>
            </div>
          </div>
          <div class="form-group">
              <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Estate') }}</label>
              <div class="col-sm-10 col-md-8">
                {!! Form::text('estate',  print_value($operation,$result['address']['estate']), array('class'=>'form-control', 'id'=>'estate')) !!}
              </div>
          </div>
          <div class="form-group">
              <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Building') }}</label>
              <div class="col-sm-10 col-md-8">
                {!! Form::text('building',  print_value($operation,$result['address']['building']), array('class'=>'form-control', 'id'=>'building')) !!}
              </div>
          </div>
          <div class="form-group">
              <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Room') }}</label>
              <div class="col-sm-10 col-md-8">
                {!! Form::text('room',  print_value($operation,$result['address']['room']), array('class'=>'form-control', 'id'=>'room')) !!}
              </div>
          </div>
          <div class="form-group">
              <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Address') }}</label>
              <div class="col-sm-10 col-md-8">
                {!! Form::text('address',  print_value($operation,$result['address']['address']), array('class'=>'form-control', 'id'=>'address','readonly')) !!}
              </div>
          </div>
            <div class="form-group">
              <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.DefaultShippingAddress') }}</label>
              <div class="col-sm-10 col-md-8">
                  <select id="is_default" class="form-control" name="is_default">    
                      <option value="inactive" {{print_selected_value($operation,"inactive",$result['address']['is_default'])}}>{{ trans('labels.No') }}</option>
                      <option value="active" {{print_selected_value($operation,"active",$result['address']['is_default'])}}>{{ trans('labels.Yes') }}</option>                                 
                  </select>
              </div>
            </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Close') }}</button>
        @if ($operation == 'add')
          <button type="submit" class="btn btn-primary" id="addAddress">{{ trans('labels.AddAddress') }}</button>
        @elseif ($operation == 'edit')
          <button type="submit" class="btn btn-primary" id="editAddress">{{ trans('labels.EditAddress') }}</button>
        @endif
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>