{{-- AddAddressModel--}}
<div class="modal fade" id="addAdressModal" tabindex="-1" role="dialog" aria-labelledby="addAdressModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addAdressModalLabel">{{ trans('labels.AddAddress') }}</h4>
      </div>
      {!! Form::open(array('url' =>'admin/addNewCustomerAddress', 'name'=>'addAddressFrom', 'id'=>'addAddressFrom', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
      {!! Form::text('customer_id',  $result['customer_id'] , array('class'=>'form-control', 'id'=>'customer_id')) !!}
      <div class="modal-body">    
          <div class="form-group">
              <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Company') }}</label>
              <div class="col-sm-10 col-md-8">
                {!! Form::text('company',  '', array('class'=>'form-control', 'id'=>'company')) !!}
              </div>
          </div>
          <div class="form-group">
              <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.FirstName') }}</label>
              <div class="col-sm-10 col-md-8">
                {!! Form::text('firstname',  '', array('class'=>'form-control', 'id'=>'firstname')) !!}
              </div>
          </div>
          <div class="form-group">
              <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.LastName') }}</label>
              <div class="col-sm-10 col-md-8">
                {!! Form::text('lastname',  '', array('class'=>'form-control', 'id'=>'lastname')) !!}
              </div>
          </div>                              
          <div class="form-group">
            <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Zone') }}</label>
            <div class="col-sm-10 col-md-8">
                <select id="zone_id" class="form-control" name="zone_id">    
                  <option value="">{{ trans('labels.SelectCountry') }}</option>
                  @foreach($result['zones'] as $zone)
                    <option value="{{ $zone->zone_id }}">{{ $zone->zone_name }}</option>
                  @endforeach                                         
                </select>
            </div>
          </div>
          <div class="form-group">
              <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Estate') }}</label>
              <div class="col-sm-10 col-md-8">
                {!! Form::text('estate',  '', array('class'=>'form-control', 'id'=>'estate')) !!}
              </div>
          </div>
          <div class="form-group">
              <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Building') }}</label>
              <div class="col-sm-10 col-md-8">
                {!! Form::text('building',  '', array('class'=>'form-control', 'id'=>'building')) !!}
              </div>
          </div>
          <div class="form-group">
              <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Room') }}</label>
              <div class="col-sm-10 col-md-8">
                {!! Form::text('room',  '', array('class'=>'form-control', 'id'=>'room')) !!}
              </div>
          </div>
          <div class="form-group">
              <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Address') }}</label>
              <div class="col-sm-10 col-md-8">
                {!! Form::text('address',  '', array('class'=>'form-control', 'id'=>'address','readonly')) !!}
              </div>
          </div>
            <div class="form-group">
              <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.DefaultShippingAddress') }}</label>
              <div class="col-sm-10 col-md-8">
                  <select id="is_default" class="form-control" name="is_default">    
                      <option value="inactive">{{ trans('labels.No') }}</option>
                      <option value="active">{{ trans('labels.Yes') }}</option>                                 
                  </select>
              </div>
            </div>
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Close') }}</button>
        <button type="submit" class="btn btn-primary" id="addAddress">{{ trans('labels.AddAddress') }}</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>