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
                      <th>{{ trans('labels.Country') }}</th>
                      <th>{{ trans('labels.City') }}</th>
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
                            <td>{{ $district->countries_name }}</td>
                            <td>{{ $district->cities_name }}</td>
                            <td>{{ $district->area_name }}</td>
                            <td>{{ $district->district_name }}</td>
                            <td>{{ $district->district_code }}</td>
                            <td>{{ $district->district_status }}</td>
                            <td>
                              <a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Edit') }}" href="editDistrict/{{ $district->district_id }}" class="badge bg-light-blue">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                              </a> 
                              <a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Delete') }}" id="deleteDistrictId" district_id="{{ $district->district_id }}" class="badge bg-red">
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
	<div class="modal fade" id="deleteDistrictModal" tabindex="-1" role="dialog" aria-labelledby="deleteDistrictModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="deleteDistrictModalLabel">{{ trans('labels.DeleteDistrict') }}</h4>
		  </div>
		  {!! Form::open(array('url' =>'admin/deleteDistrict', 'name'=>'deleteDistrict', 'id'=>'deleteDistrict', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
				  {!! Form::hidden('action',  'delete', array('class'=>'form-control')) !!}
				  {!! Form::hidden('id',  '', array('class'=>'form-control', 'id'=>'district_id')) !!}
		  <div class="modal-body">						
			  <p>{{ trans('labels.DeleteDistrictText') }}</p>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Cancel') }}</button>
			<button type="submit" class="btn btn-primary" id="deleteDistrict">{{ trans('labels.Delete') }}</button>
		  </div>
		  {!! Form::close() !!}
		</div>
	  </div>
	</div>
    
    <!--  row --> 
    
    <!-- /.row --> 
  </section>
  <!-- /.content --> 
</div>
@endsection 