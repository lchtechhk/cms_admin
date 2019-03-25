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
            <h3 class="box-title">{{ trans('labels.ListingAllCustomers') }} </h3>
            <div class="box-tools pull-right">
                <a href="{{ URL::to('admin/addCustomer')}}" type="button" class="btn btn-block btn-primary">{{ trans('labels.AddNewCustomers') }}</a>
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
                <table id="customers" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>{{ trans('labels.ID') }}</th>
                      <th>{{ trans('labels.Picture') }}</th>
                      <th>{{ trans('labels.Name') }}</th>
                      <th>{{ trans('labels.Email') }}</th>
                      <th>{{ trans('labels.Telephone') }}</th>
                      <th>{{ trans('labels.Fax') }}</th>
                      <th>{{ trans('labels.DOB') }}</th>
                      <th>{{ trans('labels.Address') }}</th>
                      <th>{{ trans('labels.Action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                   @if (count($result['customers']) > 0)
                      @foreach ($result['customers']  as $key=>$listingCustomers)
                        <tr>
                            {{-- <td>{{ json_encode($listingCustomers) }}</td> --}}
                          <td>{{ $listingCustomers->id }}</td>
                          <td>
                            @if(!empty($listingCustomers->customers_picture))
                              <img src="../{{ $listingCustomers->customers_picture }}" style="width: 50px; float: left; margin-right: 10px">
                            @else
                              <img src="../resources/assets/images/default_images/user.png" style="width: 50px; float: left; margin-right: 10px">
                            @endif    
                          </td> 
                          <td>{{ $listingCustomers->customers_firstname }} {{ $listingCustomers->customers_lastname }}<br></td>
                          <td>{{ $listingCustomers->email }}<br></td>
                          <td>{{ $listingCustomers->customers_telephone }}<br></td>
                          <td>{{ $listingCustomers->customers_fax }}<br></td>
                          <td>{{ $listingCustomers->customers_dob }}<br></td>
                          <td>
                            <strong>{{ trans('labels.Company') }}: </strong> {{ $listingCustomers->entry_company }} <br>
                            <strong>{{ trans('labels.Address') }}: </strong> 
                            @if(!empty($listingCustomers->entry_street_address)) 
                              {{ $listingCustomers->entry_street_address }},
                            @endif
                              @if(!empty($listingCustomers->entry_city)) 
                              {{ $listingCustomers->entry_city }},
                            @endif
                              @if(!empty($listingCustomers->entry_state)) 
                              {{ $listingCustomers->entry_state }},
                            @endif
                              @if(!empty($listingCustomers->entry_postcode)) 
                              {{ $listingCustomers->entry_postcode }}
                            @endif
                              @if(!empty($listingCustomers->countries_name)) 
                              {{ $listingCustomers->countries_name }}
                            @endif 
                          </td>
                          <td>
                            <ul class="nav table-nav">
                              <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                  {{ trans('labels.Action') }} <span class="caret"></span>
                                </a>
                              <ul class="dropdown-menu">
                                  <li role="presentation"><a role="menuitem" tabindex="-1" href="editCustomer/{{ $listingCustomers->id }}">{{ trans('labels.EditCustomers') }}</a></li>
                                  <li role="presentation" class="divider"></li>
                                  <li role="presentation"><a role="menuitem" tabindex="-1" href="addaddress/{{ $listingCustomers->id }}">{{ trans('labels.EditAddress') }}</a></li>
                                  <li role="presentation" class="divider"></li>
                                  <li role="presentation"><a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Delete') }}" id="deleteCustomerFrom" id="{{ $listingCustomers->id }}">{{ trans('labels.Delete') }}</a></li>
                              </ul>
                              </li>
                            </ul>
                          </td>
                        </tr>
                      @endforeach
                    @else
                        <tr>
                            <td colspan="4">{{ trans('labels.NoRecordFound') }}</td>                            
                        </tr>
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
    <!-- deleteCustomerModal -->
    <div class="modal fade" id="deleteCustomerModal" tabindex="-1" role="dialog" aria-labelledby="deleteCustomerModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="deleteCustomerModalLabel">{{ trans('labels.DeleteCustomer') }}</h4>
          </div>
          {!! Form::open(array('url' =>'admin/deletecustomers', 'name'=>'deleteCustomer', 'id'=>'deleteCustomer', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
                  {!! Form::hidden('action',  'delete', array('class'=>'form-control')) !!}
                  {!! Form::hidden('id',  '', array('class'=>'form-control', 'id'=>'id')) !!}
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
    
    <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content notificationContent"></div>
      </div>
    </div>
  </section>
</div>
@endsection 