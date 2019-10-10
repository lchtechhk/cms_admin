@extends('admin.layout') @section('content')
<div class="content-wrapper">
  @include('layouts/add_header')
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">{{ trans('labels.Add'.$result['label']) }}</h3>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
                <div class="box box-info"><br>
                  @include('layouts/responseMessage')
                  <div class="box-body">
                    {!! Form::open(array('url' =>'admin/addArea', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.City') }}
                        <span style="color:red">★</span>
                      </label>
                      <div class="col-sm-10 col-md-4">
                        <select name="city_id" class='form-control field-validate'>
                          @foreach( $result['cities'] as $city)
                          <option value="{{ $city->id }}">
                            {{ $city->name }}
                          </option>
                          @endforeach
                        </select>
                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                          {{ trans('labels.ChooseCityArea') }}</span>
                        <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.AreaName') }}
                        <span style="color:red">★</span>
                      </label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::text('name', '', array('class'=>'form-control field-validate', 'id'=>'name'))!!}
                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                          {{ trans('labels.AreaNameText') }}
                        </span>
                        <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.AreaCode') }}
                      </label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::text('code', '', array('class'=>'form-control ', 'id'=>'code'))!!}
                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                          {{ trans('labels.AreaCodeText') }}</span>
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
