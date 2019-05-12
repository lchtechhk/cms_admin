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
            <h3 class="box-title">{{ trans('labels.List'.$result['label']) }}</h3>
            <div class="box-tools pull-right">
              <a href="view_add{{$result['label']}}" type="button"
                class="btn btn-block btn-primary">{{ trans('labels.Add'.$result['label']) }}</a>
            </div>
          </div>
          <div class="box-header">
            @include('filter/country_search')
          </div>
          <div class="box-header">
            @include('element/back_btn')
            <div style="" name="m_client" class="btn btn-primary"
              onclick='cust_filtering("city",[{"id":"country_search","index":1}])'>Search</div>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
                <div class="table-wrap" style="fro">
                  <div class="table">
                    <table id="city" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>{{ trans('labels.ID') }}</th>
                          <th class="display_controller">{{ trans('labels.CountryId') }}</th>
                          <th>{{ trans('labels.Country') }}</th>
                          <th>{{ trans('labels.City') }}</th>
                          <th>{{ trans('labels.Code') }}</th>
                          <th>{{ trans('labels.Status') }}</th>
                          <th>{{ trans('labels.Action') }}</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($result['cities'] as $key=>$city)
                        <tr>
                          <td>{{ $city->cities_id }}</td>
                          <td class="display_controller">{{ $city->countries_id }}</td>
                          <td>{{ $city->countries_name }}</td>
                          <td>{{ $city->cities_name }}</td>
                          <td>{{ $city->cities_code }}</td>
                          <td>{{ $city->cities_status }}</td>
                          <td>
                            <a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Edit') }}"
                              href="view_editCity/{{ $city->cities_id }}" class="badge bg-light-blue">
                              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Delete') }}"
                              id="deleteCityId" cities_id="{{$city->cities_id}}" class="badge bg-red">
                              <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-xs-12 text-right">
                  {{$result['cities']->links('vendor.pagination.default')}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- delete -->
    @include('admin/location/city/deleteCity')
  </section>
</div>
@endsection