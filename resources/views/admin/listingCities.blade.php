@extends('admin.layout')
@section('content')
<div class="content-wrapper"> 
  <section class="content-header">
    <h1> {{ trans('labels.Cities') }} <small> {{ trans('labels.ListingAllCities') }}...</small> </h1>
    <ol class="breadcrumb">
      <li><a href="{{ URL::to('admin/dashboard/this_month')}}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
      <li class="active"> {{ trans('labels.Cities') }}</li>
    </ol>
  </section>
  <section class="content"> 
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">{{ trans('labels.ListingAllCities') }} </h3>
            <div class="box-tools pull-right">
            	<a href="addCity" type="button" class="btn btn-block btn-primary">{{ trans('labels.AddCity') }}</a>
            </div>
          </div>

          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">           		
              @include('layouts/responseMessage')
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>{{ trans('labels.ID') }}</th>
                      <th>{{ trans('labels.Country') }}</th>
                      <th>{{ trans('labels.City') }}</th>
                      <th>{{ trans('labels.Code') }}</th>
                      <th>{{ trans('labels.Action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($result['cities'] as $key=>$cities)
                        <tr>
                            <td>{{ $cities->cities_id }}</td>
                            <td>{{ $cities->countries_name }}</td>
                            <td>{{ $cities->cities_name }}</td>
                            <td>{{ $cities->cities_code }}</td>
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