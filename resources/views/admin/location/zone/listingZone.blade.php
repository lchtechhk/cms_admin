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
                @include('filter/district_search')
              </div>
            </div>
          </div>
          <div class="box-header">
            @include('element/back_btn')
            <div style="" name="m_client" class="btn btn-primary"
              onclick='cust_filtering("zone",[{"id":"country_search","index":1},{"id":"city_search","index":3},{"id":"area_search","index":5},{"id":"district_search","index":7}])'>
              Search</div>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
                <div class="table-wrap" style="fro">
                  <div class="table">
                    <table id="zone" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>{{ trans('labels.ID') }}</th>
                          <th class="display_controller">{{ trans('labels.CountryId') }}</th>
                          <th>{{ trans('labels.Country')}}
                          <th class="display_controller">{{ trans('labels.CityId') }}</th>
                          <th>{{ trans('labels.City') }}</th>
                          <th class="display_controller">{{ trans('labels.AreaId') }}</th>
                          <th>{{ trans('labels.Area') }}</th>
                          <th class="display_controller">{{ trans('labels.DistrictId') }}</th>
                          <th>{{ trans('labels.District') }}</th>
                          <th>{{ trans('labels.Zone') }}</th>
                          <th>{{ trans('labels.Code') }}</th>
                          <th>{{ trans('labels.Action') }}</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($result['zones'] as $key=>$zones)
                        <tr>
                          <td>{{ $zones->zone_id }}</td>
                          <td class="display_controller">{{ $zones->countries_id }}</td>
                          <td>{{ $zones->countries_name }}</td>
                          <td class="display_controller">{{ $zones->cities_id }}</td>
                          <td>{{ $zones->cities_name }}</td>
                          <td class="display_controller">{{ $zones->area_id }}</td>
                          <td>{{ $zones->area_name }}</td>
                          <td class="display_controller">{{ $zones->district_id }}</td>
                          <td>{{ $zones->district_name }}</td>
                          <td>{{ $zones->zone_name }}</td>
                          <td>{{ $zones->zone_code }}</td>
                          <td>
                            <a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Edit') }}"
                              href="editZone/{{ $zones->zone_id }}" class="badge bg-light-blue">
                              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                            <a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Delete') }}"
                              id="deleteZoneId" zone_id="{{ $zones->zone_id }}" class="badge bg-red">
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
                  {{$result['zones']->links('vendor.pagination.default')}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- delete -->
    @include('admin/location/zone/deleteDistrict')
  </section>
</div>
@endsection