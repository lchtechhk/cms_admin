@extends('admin.layout')
@section('content')
<div class="content-wrapper">
  @include('layouts/list_header')
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">{{ trans('labels.List'.$result['label']) }}</h3>
            <div class="box-tools pull-right">
            <a href="add{{$result['label']}}" type="button" class="btn btn-block btn-primary">{{ trans('labels.Add'.$result['label']) }}</a>
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>{{ trans('labels.ID') }}</th>
                      <th>{{ trans('labels.Country')}}
                      <th>{{ trans('labels.City') }}</th>
                      <th>{{ trans('labels.Area') }}</th>
                      <th>{{ trans('labels.Code') }}</th>
                      <th>{{ trans('labels.Status') }}</th>
                      <th>{{ trans('labels.Action') }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($result['area'] as $key=>$area)
                        <tr>
                            <td>{{ $area->area_id }}</td>
                            <td>{{ $area->countries_name }}</td>
                            <td>{{ $area->cities_name }}</td>
                            <td>{{ $area->area_name }}</td>
                            <td>{{ $area->area_code }}</td>
                            <td>{{ $area->area_status }}</td>
                            <td>
                                <a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Edit') }}" href="editArea/{{ $area->area_id }}" class="badge bg-light-blue">
                                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a> 
                                <a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Delete') }}" id="deleteAreaId"  area_id ="{{$area->area_id}}" class="badge bg-red">
                                  <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="col-xs-12 text-right">
                	{{$result['area']->links('vendor.pagination.default')}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	<div class="modal fade" id="deleteAreaModal" tabindex="-1" role="dialog" aria-labelledby="deleteAreaModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="deleteAreaModalLabel">{{ trans('labels.deleteArea') }}</h4>
		  </div>
          {!! Form::open(array('url' =>'admin/deleteArea', 'name'=>'deleteArea', 'id'=>'deleteArea', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
              {!! Form::hidden('action',  'delete', array('class'=>'form-control')) !!}
              {!! Form::hidden('id',  '' , array('class'=>'form-control', 'id'=>'area_id')) !!}
            <div class="modal-body">						
              <p>{{ trans('labels.deleteAreaText') }}</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Cancel') }}</button>
            <button type="submit" class="btn btn-primary" id="deleteArea">{{ trans('labels.Delete') }}</button>
            </div>
          {!! Form::close() !!}
		</div>
	  </div>
	</div>
  </section>
</div>
@endsection 