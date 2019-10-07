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
              <button type="button" class="btn btn-block btn-primary addAddressModal"
                customer_id='{{$result['customer_id']}}' data-toggle="modal">{{ trans('labels.AddAddress') }}</button>
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <div class="table-wrap" style="fro">
                  <div class="table">
                    <table id="customer_address" class="table table-bordered table-striped">
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
                          <td>{{ $customer_address->id }}</td>
                          <td>
                            <strong>{{ trans('labels.Company') }}:</strong> {{ $customer_address->company }}<br>
                            <strong>{{ trans('labels.FirstName') }}:</strong> {{ $customer_address->firstname }}<br>
                            <strong>{{ trans('labels.LastName') }}:</strong> {{ $customer_address->lastname }}
                          </td>
                          <td>
                            <strong>{{ trans('labels.FullAddress') }}:</strong> {{ $customer_address->address_ch }}<br>
                          </td>
                          <td>
                            <a class="badge bg-light-blue editAddressModal" customer_id='{{$result['customer_id']}}'
                              id="{{$customer_address->id}}"><i class="fa fa-pencil-square-o"
                                aria-hidden="true"></i></a>
                            <a class="badge bg-red deleteAddressModal" customer_id='{{ $result['customer_id'] }}'
                              id="{{ $customer_address->id }}"><i class="fa fa-trash " aria-hidden="true"></i></a></td>
                          </td>
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
              </div>
            </div>
            <div class="box-footer text-center">
              <a href="{{ URL::to('admin/customers')}}" class="btn btn-primary">{{ trans('labels.SaveComplete') }}</a>
            </div>
          </div>
          <!-- addressDialog -->
          <div class="modal fade" id="addressDialog" tabindex="-1" role="dialog" aria-labelledby="addressLabel">
            @include('admin/addressbook/addressDialog')
          </div>
          <!-- deleteAddressModal -->
          @include('admin/addressbook/deleteAddressDialog')
        </div>
      </div>
    </div>
  </section>
</div>
@endsection