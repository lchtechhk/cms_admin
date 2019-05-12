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
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
                <div class="table-wrap" style="fro">
                  <div class="table">
                    <table id="country" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>{{ trans('labels.ID') }}</th>
                          <th>{{ trans('labels.CountryName') }}</th>
                          <th>{{ trans('labels.ISOCode2') }}</th>
                          {{-- <th>{{ trans('labels.ISOCode3') }}</th> --}}
                          <th>{{ trans('labels.Status') }}</th>
                          <th>{{ trans('labels.Action') }}</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($result['countries'])>0)
                        @foreach ($result['countries'] as $key=>$country)
                        <tr>
                          <td>{{ $country->id }}</td>
                          <td>{{ $country->name }}</td>
                          <td>{{ $country->iso_code_1 }}</td>
                          <td>{{ $country->status }}</td>

                          <td><a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Edit') }}"
                              href="view_editCountry/{{ $country->id }}" class="badge bg-light-blue"><i
                                class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a data-toggle="tooltip" data-placement="bottom" title=" {{ trans('labels.Delete') }}"
                              id="deleteCountryId" countries_id="{{ $country->id }}" class="badge bg-red"><i
                                class="fa fa-trash" aria-hidden="true"></i></a>
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
                <div class="col-xs-12 text-right">
                  {{$result['countries']->links('vendor.pagination.default')}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- delete -->
    @include('admin/location/country/deleteCountry')
  </section>
</div>
@endsection