@extends('admin.layout')
@section('content')
<div class="content-wrapper"> 
  @include('layouts/edit_header')
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">{{ trans('labels.Edit'.$result['label']) }}</h3>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
                <div class="box box-info"><br>
                  @include('layouts/responseMessage')
                  <div class="box-body">      
                      {!! Form::open(array('url' =>'admin/updateZone/'.$result["zone"]->id, 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}        
                      <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ID') }}<span style="color:red">★</label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::text('id', $result['zone']->id, array('class'=>'form-control', 'id'=>'id','readonly'=>'true'))!!}
                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.CountryNameText') }}</span>
                            <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                          </div>
                      </div>

                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.District') }}</label>
                            <div class="col-sm-10 col-md-4">
                              <select name="district_id" class='form-control field-validate'>
                                  @foreach( $result['districts'] as $district)
                                  <option
                                    @if( $district->id == $result['zone']->district_id)
                                        selected
                                      @endif
                                    value="{{ $district->id }}"> {{ $district->name }} </option>
                                  @endforeach
                              </select>
                              <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.ChooseZoneArea') }}</span>
                              <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                            </div>
                        </div>
                                      
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ZoneName') }}</label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::text('name', $result['zone']->name, array('class'=>'form-control field-validate', 'id'=>'name'))!!}
                              <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.ZoneNameText') }}</span>
                              <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ZoneCode') }}</label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::text('code', $result['zone']->code, array('class'=>'form-control', 'id'=>'code'))!!}
                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.ZoneCodeText') }}</span>
                                <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.CreateDate') }}<span style="color:red">★</label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::text('create_date',  $result['zone']->create_date, array('class'=>'form-control', 'id'=>'create_date','readonly'=>'true')) !!}
                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.CreateDate') }}</span>
                            <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.EditDate') }}<span style="color:red">★</label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::text('edit_date',  $result['zone']->edit_date, array('class'=>'form-control', 'id'=>'edit_date','readonly'=>'true')) !!}
                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.EditDate') }}</span>
                            <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                          </div>
                        </div>

                        @include('layouts/submit_back_button')
                      {!! Form::close() !!}
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection 