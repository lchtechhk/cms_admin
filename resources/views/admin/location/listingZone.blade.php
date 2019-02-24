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
              <div class="row">
                  <div class="col-md-2">
                    @include('filter/country_search')
                  </div>
                  <div class="col-md-2">
                    @include('filter/city_search')   
                  </div>
              </div> 
              <br/>
              <div class="row">
                  <div class="col-md-2">
                    @include('filter/area_search')   
                  </div>
                  <div class="col-md-2">
                      @include('filter/district_search')   
                  </div>
              </div> 
            </div>
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
                <table id="zone" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>{{ trans('labels.ID') }}</th>
                      <th>{{ trans('labels.Country') }}</th>
                      <th>{{ trans('labels.City') }}</th>
                      <th>{{ trans('labels.Area') }}</th>
                      <th>{{ trans('labels.Zone') }}</th>
                      <th>{{ trans('labels.Code') }}</th>
                      <th>{{ trans('labels.Action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($result['zones'] as $key=>$zones)
                        <tr>
                            <td>{{ $zones->zone_id }}</td>
                            <td>{{ $zones->countries_name }}</td>
                            <td>{{ $zones->cities_name }}</td>
                            <td>{{ $zones->area_name }}</td>
                            <td>{{ $zones->zone_name }}</td>
                            <td>{{ $zones->zone_code }}</td>
                            <td>
                              <a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Edit') }}" href="editZone/{{ $zones->zone_id }}" class="badge bg-light-blue">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                              </a> 
                              <a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Delete') }}" id="deleteZoneId" zone_id="{{ $zones->zone_id }}" class="badge bg-red">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                              </a>
                           </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="col-xs-12 text-right">
                	{{$result['zones']->links('vendor.pagination.default')}}
                </div>
              </div>
            </div>
          </div>
          <!-- /.box-body --> 
        </div>
        <!-- /.box --> 
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.row --> 
        <!-- deleteZoneModal -->
	<div class="modal fade" id="deleteZoneModal" tabindex="-1" role="dialog" aria-labelledby="deleteZoneModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="deleteZoneModalLabel">{{ trans('labels.DeleteZone') }}</h4>
		  </div>
		  {!! Form::open(array('url' =>'admin/deleteZone', 'name'=>'deleteZone', 'id'=>'deleteZone', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
				  {!! Form::hidden('action',  'delete', array('class'=>'form-control')) !!}
				  {!! Form::hidden('id',  '', array('class'=>'form-control', 'id'=>'zone_id')) !!}
		  <div class="modal-body">						
			  <p>{{ trans('labels.DeleteZoneText') }}</p>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Cancel') }}</button>
			<button type="submit" class="btn btn-primary" id="deleteZone">{{ trans('labels.Delete') }}</button>
		  </div>
		  {!! Form::close() !!}
		</div>
	  </div>
	</div>
  </section>
</div>
@endsection 