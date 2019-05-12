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
                  {!! Form::open(array('url' =>'admin/updateCountry/'.$result['country']->id, 'method'=>'post', 'class' => 'form-horizontal field-validat', 'enctype'=>'multipart/form-data')) !!}
                    <div class="box-body">      
                      
                      <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ID') }}<span style="color:red">★</label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::text('id',  $result['country']->id , array('class'=>'form-control', 'id'=>'id','readonly'=>'true')) !!}
                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.CountryNameText') }}</span>
                            <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                          </div>
                      </div>
 
                      <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.CountryName') }}<span style="color:red">★</label>
                        <div class="col-sm-10 col-md-4">
                          {!! Form::text('name', $result['country']->name, array('class'=>'form-control field-validat', 'id'=>'countries_name'))!!}
                          <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.CountryNameText') }}</span>
                          <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ISOCode2') }}</label>
                        <div class="col-sm-10 col-md-4">
                          {!! Form::text('iso_code_1', $result['country']->iso_code_1, array('class'=>'form-control field-validat', 'id'=>'countries_iso_code_2'))!!}
                          <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.ISOCode2Text') }}</span>
                          <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                        </div>
                      </div>

                      {{-- <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ISOCode3') }}</label>
                        <div class="col-sm-10 col-md-4">
                          {!! Form::text('iso_code_2', $result['country']->iso_code_2, array('class'=>'form-control field-validat', 'id'=>'countries_iso_code_3'))!!}
                          <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.ISOCode3Text') }}</span>
                          <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                        </div>
                      </div> --}}


                      <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.CreateDate') }}<span style="color:red">★</label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::text('create_date',  $result['country']->create_date, array('class'=>'form-control', 'id'=>'create_date','readonly'=>'true')) !!}
                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.CreateDate') }}</span>
                            <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                          </div>
                      </div>
                      
                      <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.EditDate') }}<span style="color:red">★</label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::text('edit_date',  $result['country']->edit_date, array('class'=>'form-control', 'id'=>'edit_date','readonly'=>'true')) !!}
                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.EditDate') }}</span>
                            <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                          </div>
                      </div>

                      @include('layouts/submit_back_button')
                      
                    </div>
                  {!! Form::close() !!}
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