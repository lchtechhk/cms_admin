@include('generic/view_function')
{{-- AddAddressModel--}}
{{-- <div class="modal fade" id="addressDialog" tabindex="-1" role="dialog" aria-labelledby="addressLabel"> --}}
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="addressLabel">{{ trans('labels.AddAddress') }}</h4>
      </div>
     
      @if ($result['operation'] == 'listing' || $result['operation'] == 'view_add' )
      {!! Form::open(array('url' => array('admin/addAddressBook/'.$result['customer_id']), 'name'=>'addAddressFrom', 'id'=>'addAddressFrom', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
      @elseif ($result['operation'] == 'view_edit')
      {!! Form::open(array('url' => array('admin/updateAddressBook/'.$result['id']), 'name'=>'editAddressFrom', 'id'=>'editAddressFrom', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
      @endif
      {!! Form::hidden('customer_id',  empty($result['customer_id']) ? '' :  print_value($result['operation'],$result['customer_id']) , array('class'=>'form-control', 'id'=>'customer_id')) !!}
      <div class="modal-body">    
          <div class="form-group">
              <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Company') }}</label>
              <div class="col-sm-10 col-md-8">
                  {!! Form::text('company', empty($result['address']->company) ? '' :  print_value($result['operation'],$result['address']->company), array('class'=>'form-control', 'id'=>'company')) !!}
              </div>
          </div>
          <div class="form-group">
              <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.FirstName') }}</label>
              <div class="col-sm-10 col-md-8">
                  {!! Form::text('firstname',  empty($result['address']->firstname) ? '' :  print_value($result['operation'],$result['address']->firstname), array('class'=>'form-control', 'id'=>'firstname')) !!}
              </div>
          </div>
          <div class="form-group">
              <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.LastName') }}</label>
              <div class="col-sm-10 col-md-8">
                  {!! Form::text('lastname',  empty($result['address']->lastname) ? '' :  print_value($result['operation'],$result['address']->lastname) , array('class'=>'form-control', 'id'=>'lastname')) !!}
              </div>
          </div>   
          <div class="form-group">
            <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.District') }}</label>
            <div class="col-sm-10 col-md-8">
                <select id="district_id" class="form-control" name="district_id">    
                <option value="">{{ trans('labels.SelectDistrict') }}</option>
                @foreach($result['districts'] as $district)
                    <option value="{{ $district->district_id }}" {{empty($result['address']->district_id) ? '' :  print_selected_value($result['operation'],$district->district_id,$result['address']->district_id)}} >{{ $district->district_name }}</option>
                @endforeach                                         
                </select>
            </div>
        </div>                           
          {{-- <div class="form-group">
              <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Zone') }}</label>
              <div class="col-sm-10 col-md-8">
                  <select id="zone_id" class="form-control" name="zone_id">    
                  <option value="">{{ trans('labels.SelectCountry') }}</option>
                  @foreach($result['zones'] as $zone)
                      <option value="{{ $zone->zone_id }}" {{empty($result['address']->zone_id) ? '' :  print_selected_value($result['operation'],$zone->zone_id,$result['address']->zone_id)}} >{{ $zone->zone_name }}</option>
                  @endforeach                                         
                  </select>
              </div>
          </div> --}}
          <div class="form-group">
              <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Estate') }}</label>
              <div class="col-sm-10 col-md-8">
                  {!! Form::text('estate',  empty($result['address']->estate) ? '' :  print_value($result['operation'],$result['address']->estate), array('class'=>'form-control', 'id'=>'estate')) !!}
              </div>
          </div>
          <div class="form-group">
              <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Building') }}</label>
              <div class="col-sm-10 col-md-8">
                  {!! Form::text('building',  empty($result['address']->building) ? '' :  print_value($result['operation'],$result['address']->building), array('class'=>'form-control', 'id'=>'building')) !!}
              </div>
          </div>
          <div class="form-group">
              <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Room') }}</label>
              <div class="col-sm-10 col-md-8">
                  {!! Form::text('room',  empty($result['address']->room) ? '' :  print_value($result['operation'],$result['address']->room), array('class'=>'form-control', 'id'=>'room')) !!}
              </div>
          </div>
          {{-- <div class="form-group">
              <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Address') }}</label>
              <div class="col-sm-10 col-md-8">
                  {!! Form::text('address',  empty($result['address']->address_ch) ? '' :  print_value($result['operation'],$result['address']->address_ch), array('class'=>'form-control', 'id'=>'address','readonly')) !!}
              </div>
          </div> --}}
          <div class="form-group">
              <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.DefaultShippingAddress') }}</label>
              <div class="col-sm-10 col-md-8">
                  <select id="is_default" class="form-control" name="is_default">    
                      <option value="inactive" {{empty($result['address']->is_default) ? '' :  print_selected_value($result['operation'],'inactive',$result['address']->is_default)}}>{{ trans('labels.No') }}</option>
                      <option value="active" {{empty($result['address']->is_default) ? '' :  print_selected_value($result['operation'],'active',$result['address']->is_default)}}>{{ trans('labels.Yes') }}</option>                                 
                  </select>
              </div>
          </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Close') }}</button>
        @if ($result['operation'] == 'listing' || $result['operation'] == 'view_add' )
          <button type="submit" class="btn btn-primary" id="addAddress">{{ trans('labels.AddAddress') }}</button>
        @elseif ($result['operation'] == 'view_edit')
          <button type="submit" class="btn btn-primary" id="editAddress">{{ trans('labels.EditAddress') }}</button>
        @endif
      </div>
      {!! Form::close() !!}
    </div>
  </div>
{{-- </div> --}}