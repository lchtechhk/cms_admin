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
              <a href="add{{$result['label']}}" type="button" class="btn btn-block btn-primary">{{ trans('labels.Add'.$result['label']) }}</a>
            </div>
          </div>
          <div class="box-header">
              @include('filter/country_search')
          </div>
          <div class="box-header">
            @include('element/back_btn')
              <div style="" name="m_client" class="btn btn-primary" 
              onclick='cust_filtering("city",[{"id":"country_search","index":1}])' >Search</div>
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
                          <th class="display_controller" >{{ trans('labels.CountryId') }}</th>
                          <th>{{ trans('labels.Country') }}</th>
                          <th>{{ trans('labels.City') }}</th>
                          <th>{{ trans('labels.Code') }}</th>
                          <th>{{ trans('labels.Status') }}</th>
                          <th>{{ trans('labels.Action') }}</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($result['cities'] as $key=>$cities)
                            <tr>
                                <td>{{ $cities->cities_id }}</td>
                                <td class="display_controller">{{ $cities->countries_id }}</td>
                                <td>{{ $cities->countries_name }}</td>
                                <td>{{ $cities->cities_name }}</td>
                                <td>{{ $cities->cities_code }}</td>
                                <td>{{ $cities->cities_status }}</td>
                                <td>
                                    <a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Edit') }}" href="editCity/{{ $cities->cities_id }}" class="badge bg-light-blue">
                                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a> 
                                    <a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Delete') }}" id="deleteCityId"  cities_id ="{{$cities->cities_id}}" class="badge bg-red">
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
	<div class="modal fade" id="deleteCityModal" tabindex="-1" role="dialog" aria-labelledby="deleteCityModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="deleteCityModalLabel">{{ trans('labels.DeleteCity') }}</h4>
		  </div>
          {!! Form::open(array('url' =>'admin/deleteCity', 'name'=>'deleteCity', 'id'=>'deleteCity', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
              {!! Form::hidden('action',  'delete', array('class'=>'form-control')) !!}
              {!! Form::hidden('id',  '' , array('class'=>'form-control', 'id'=>'cities_id')) !!}
            <div class="modal-body">						
              <p>{{ trans('labels.DeleteCityText') }}</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Cancel') }}</button>
            <button type="submit" class="btn btn-primary" id="deleteCity">{{ trans('labels.Delete') }}</button>
            </div>
          {!! Form::close() !!}
		</div>
	  </div>
	</div>
  </section>
</div>
@endsection 