@extends('admin.layout')
@section('content')
  <div class="content-wrapper"> 
    <section class="content-header">
      <h1> {{ trans('labels.AddCountry') }} <small>{{ trans('labels.AddCountry') }}...</small> </h1>
      <ol class="breadcrumb">
        <li><a href="{{ URL::to('admin/dashboard/this_month')}}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
        <li><a href="{{ URL::to('admin/countries')}}"><i class="fa fa-dashboard"></i>{{ trans('labels.ListingCountries') }} </a></li>
        <li class="active">{{ trans('labels.AddCountry') }} </li>
      </ol>
    </section>
    <section class="content"> 
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">{{ trans('labels.AddCountry') }}</h3>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
                <div class="box box-info"><br>
                  @include('layouts/responseMessage')
                  {!! Form::open(array('url' =>'admin/addNewCountry', 'method'=>'post', 'class' => 'form-horizontal  form-validate', 'enctype'=>'multipart/form-data')) !!}
                    <div class="box-body">
                      <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.CountryName') }}
                        </label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::text('name',  '', array('class'=>'form-control  field-validate', 'id'=>'countries_name'))!!}
                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                            {{ trans('labels.CountryNameText') }}</span>
                            <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ISOCode2') }}
                        </label>
                        <div class="col-sm-10 col-md-4">
                          {!! Form::text('iso_code_1',  '', array('class'=>'form-control field-validate', 'id'=>'countries_iso_code_2'))!!}
                          <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                          {{ trans('labels.ISOCode2Text') }}</span>
                          <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ISOCode3') }}
                        </label>
                        <div class="col-sm-10 col-md-4">
                          {!! Form::text('iso_code_2',  '', array('class'=>'form-control field-validate', 'id'=>'countries_iso_code_3'))!!}
                          <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                          {{ trans('labels.ISOCode3Text') }}</span>
                          <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                        </div>
                      </div>

                      <div class="box-footer text-center">
                        <button type="submit" class="btn btn-primary">{{ trans('labels.AddCountry') }}</button>
                        <a href="{{ URL::to('admin/listingCountry')}}" type="button" class="btn btn-default">{{ trans('labels.back') }}</a>
                      </div>
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