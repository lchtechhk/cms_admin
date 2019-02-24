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
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
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
                    @foreach ($result['countries'] as $key=>$countries)
                        <tr>
                            <td>{{ $countries->id }}</td>
                            <td>{{ $countries->name }}</td>
                            <td>{{ $countries->iso_code_1 }}</td>
                            {{-- <td>{{ $countries->iso_code_2 }}</td> --}}
                            <td>{{ $countries->status }}</td>

                            <td><a data-toggle="tooltip" data-placement="bottom" title="{{ trans('labels.Edit') }}" href="editCountry/{{ $countries->id }}" class="badge bg-light-blue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
                            <a  data-toggle="tooltip" data-placement="bottom" title=" {{ trans('labels.Delete') }}" id="deleteCountryId" countries_id ="{{ $countries->id }}" class="badge bg-red"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
                <div class="col-xs-12 text-right">
                	{{$result['countries']->links('vendor.pagination.default')}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="deleteCountryModal" tabindex="-1" role="dialog" aria-labelledby="deleteCountryModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="deleteCountryModalLabel">{{ trans('labels.DeleteCountry') }}</h4>
          </div>
          {!! Form::open(array('url' =>'admin/deleteCountry', 'name'=>'deleteCountry', 'id'=>'deleteCountry', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
              {!! Form::hidden('action',  'delete', array('class'=>'form-control')) !!}
              {!! Form::hidden('id',  '', array('class'=>'form-control', 'id'=>'countries_id')) !!}
            <div class="modal-body">						
              <p>{{ trans('labels.DeleteCountryText') }}</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Close') }}</button>
              <button type="submit" class="btn btn-primary" id="deleteCountry">{{ trans('labels.DeleteCountry') }}</button>
            </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </section>
</div>
@endsection 