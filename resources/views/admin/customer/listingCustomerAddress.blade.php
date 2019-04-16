@extends('admin.layout')
@section('content')
<div class="content-wrapper">
  @include('layouts/list_header')
  <section class="content">
    @include('layouts/responseMessage')
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">{{ trans('labels.ListingCustomerAddresses') }}</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#addAdressModal">{{ trans('labels.AddAddress') }}</button>
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>{{ trans('labels.ID') }}</th>
                      <th>{{ trans('labels.BasicInfo') }}</th>
                      <th>{{ trans('labels.AddressInfo') }}</th>
                      <th>{{ trans('labels.Action') }}</th>
                    </tr>
                  </thead>
                  <tbody class="contentAttribute">                   
                    @if (count($result['customer_address']) > 0)
                      @foreach($result['customer_address'] as $customer_address)
                        <tr>
                            <td>{{ $customer_address->address_book_id }}</td>
                            <td>
                                <strong>{{ trans('labels.Company') }}:</strong> {{ $customer_address->entry_company }}<br>
                                <!--<strong>Gender:</strong> {{ $customer_address->entry_gender }}<br>-->
                                <strong>{{ trans('labels.FirstName') }}:</strong> {{ $customer_address->entry_firstname }}<br>
                                <strong>{{ trans('labels.LastName') }}:</strong> {{ $customer_address->entry_lastname }}
                            </td>
                            <td>
                                <strong>{{ trans('labels.Street') }}:</strong> {{ $customer_address->entry_street_address }}<br>
                                <strong>{{ trans('labels.Suburb') }}:</strong> {{ $customer_address->entry_suburb }}<br>
                                <strong>{{ trans('labels.Postcode') }}:</strong> {{ $customer_address->entry_postcode }}<br>
                                <strong>{{ trans('labels.City') }}:</strong> {{ $customer_address->entry_city }}<br>
                                <strong>{{ trans('labels.State') }}:</strong> {{ $customer_address->entry_state }}<br>
                                <strong>{{ trans('labels.Zone') }}:</strong> {{ $customer_address->zone_name }}<br>
                                <strong>{{ trans('labels.Country') }}:</strong> {{ $customer_address->countries_name }}
                            </td>
                            <td>
                                <a class="badge bg-light-blue editAddressModal" customers_id = '{{ $result['customers_id'] }}' address_book_id = "{{ $customer_address->address_book_id }}" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
                                    
                                <a customers_id = '{{ $result['customers_id'] }}' address_book_id = "{{ $customer_address->address_book_id }}" class="badge bg-red deleteAddressModal"><i class="fa fa-trash " aria-hidden="true"></i></a></td>
                        </tr> 
                      @endforeach
                    @else
                      <tr>
                          <td colspan="5">{{ trans('labels.NoRecordFound') }}</td>
                      </tr>
                    @endif
                  </tbody>
                </table>
                 </div>
              </div>
              <div class="box-footer text-center">
                <a href="{{ URL::to('admin/customers')}}" class="btn btn-primary">{{ trans('labels.SaveComplete') }}</a>
            </div>
          </div>
          <div class="modal fade" id="addAdressModal" tabindex="-1" role="dialog" aria-labelledby="addAdressModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="addAdressModalLabel">{{ trans('labels.AddAddress') }}</h4>
                </div>
                {!! Form::open(array('url' =>'admin/addNewProductAttribute', 'name'=>'addAddressFrom', 'id'=>'addAddressFrom', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
                {!! Form::hidden('customers_id',  $result['customers_id'] , array('class'=>'form-control', 'id'=>'entry_company')) !!}
                <div class="modal-body">    
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Company') }}</label>
                        <div class="col-sm-10 col-md-8">
                          {!! Form::text('entry_company',  '', array('class'=>'form-control', 'id'=>'entry_company')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.FirstName') }}</label>
                        <div class="col-sm-10 col-md-8">
                          {!! Form::text('entry_firstname',  '', array('class'=>'form-control', 'id'=>'entry_firstname')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.LastName') }}</label>
                        <div class="col-sm-10 col-md-8">
                          {!! Form::text('entry_lastname',  '', array('class'=>'form-control', 'id'=>'entry_lastname')) !!}
                        </div>
                    </div>                              
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Zone') }}</label>
                      <div class="col-sm-10 col-md-8">
                          <select id="entry_country_id" class="form-control" name="entry_country_id">    
                            <option value="">{{ trans('labels.SelectCountry') }}</option>
                            @foreach($result['countries'] as $countries_data)
                              <option value="{{ $countries_data->zone_id }}">{{ $countries_data->zone_name }}</option>
                            @endforeach                                         
                          </select>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Estate') }}</label>
                        <div class="col-sm-10 col-md-8">
                          {!! Form::text('entry_street_address',  '', array('class'=>'form-control', 'id'=>'entry_street_address')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Building') }}</label>
                        <div class="col-sm-10 col-md-8">
                          {!! Form::text('entry_street_address',  '', array('class'=>'form-control', 'id'=>'entry_street_address')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Room') }}</label>
                        <div class="col-sm-10 col-md-8">
                          {!! Form::text('entry_street_address',  '', array('class'=>'form-control', 'id'=>'entry_street_address')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Address') }}</label>
                        <div class="col-sm-10 col-md-8">
                          {!! Form::text('entry_street_address',  '', array('class'=>'form-control', 'id'=>'entry_street_address','readonly')) !!}
                        </div>
                    </div>
                      <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.DefaultShippingAddress') }}</label>
                        <div class="col-sm-10 col-md-8">
                            <select id="is_default" class="form-control" name="is_default">    
                                <option value="active">{{ trans('labels.No') }}</option>
                                <option value="inactive">{{ trans('labels.Yes') }}</option>                                 
                            </select>
                        </div>
                      </div>
                      
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Close') }}</button>
                  <button type="button" class="btn btn-primary" id="addAddress">{{ trans('labels.AddAddress') }}</button>
                </div>
                {!! Form::close() !!}
              </div>
            </div>
          </div>
          <!-- editAddressModal -->
          <div class="modal fade" id="editAddressModal" tabindex="-1" role="dialog" aria-labelledby="editAddressModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content editContent">             
              </div>
            </div>
          </div>
          <!-- deleteAddressModal -->
          <div class="modal fade" id="deleteAddressModal" tabindex="-1" role="dialog" aria-labelledby="deleteAddressModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="deleteAddressModalLabel">{{ trans('labels.DeleteAddress') }}</h4>
                    </div>
                    {!! Form::open(array('url' =>'admin/deleteAddress', 'name'=>'deleteAddress', 'id'=>'deleteAddress', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
                            {!! Form::hidden('customers_id',  '', array('class'=>'form-control', 'id'=>'customers_id')) !!}
                            {!! Form::hidden('address_book_id',  '', array('class'=>'form-control', 'id'=>'address_book_id')) !!}
                    <div class="modal-body">
                      <p>{{ trans('labels.DeleteAddressText') }}</p>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Cancel') }}</button>
                      <button type="button" class="btn btn-primary" id="deleteAddressBtn">{{ trans('labels.Delete') }}</button>
                    </div>
                    @include('layouts/submit_back_button')
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection