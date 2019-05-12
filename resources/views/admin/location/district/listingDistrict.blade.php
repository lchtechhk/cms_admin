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
            <div class="row">
              <div class="col-md-2">
                @include('filter/country_search')
              </div>
              <div class="col-md-2">
                @include('filter/city_search')
              </div>
            </div>
            <br />
            <div class="row">
              <div class="col-md-2">
                @include('filter/area_search')
              </div>
              <div class="col-md-2">

              </div>
            </div>
          </div>
          <div class="box-header">
            @include('element/back_btn')
            <div style="" name="m_client" class="btn btn-primary"
              onclick='cust_filtering("district",[{"id":"country_search","index":1},{"id":"city_search","index":3},{"id":"area_search","index":5}])'>
              Search</div>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
                <div class="table-wrap" style="fro">
                  <div class="table">
                    <table id="district" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>{{ trans('labels.ID') }}</th>
                          <th class="display_controller">{{ trans('labels.CountryId') }}</th>
                          <th>{{ trans('labels.Country')}}
                          <th class="display_controller">{{ trans('labels.CityId') }}</th>
                          <th>{{ trans('labels.City') }}</th>
                          <th class="display_controller">{{ trans('labels.AreaId') }}</th>
                          <th>{{ trans('labels.Area') }}</th>
                          <th>{{ trans('labels.District') }}</th>
                          <th>{{ trans('labels.Code') }}</th>
                          <th>{{ trans('labels.Status') }}</th>
                          <th>{{ trans('labels.Action') }}</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($result['district'] as $key=>$district)
                        <tr>
                          <td>{{ $district->district_id }}</td>
                          <td class="display_controller">{{ $district->countries_id }}</td>
                          <td>{{ $district->countries_name }}</td>
                          <td class="display_controller">{{ $district->cities_id }}</td>
                          <td>{{ $district->cities_name }}</td>
                          <td class="display_controller">{{ $district->area_id }}</td>
                          <td>{{ $district->area_name }}</td>
                          <td>{{ $district->district_name }}</td>
                          <td>{{ $district->district_code }}</td>
                          <td>{{ $district->district_status }}</td>
                          <td>
                            <a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Edit') }}"
                              href="view_editDistrict/{{ $district->district_id }}" class="badge bg-light-blue">
                              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Delete') }}"
                              id="deleteDistrictId" district_id="{{ $district->district_id }}" class="badge bg-red">
                              <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div class="col-xs-12 text-right">
                      {{$result['district']->links('vendor.pagination.default')}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- delete -->
    @include('admin/location/district/deleteDistrict')
  </section>
</div>
@endsection