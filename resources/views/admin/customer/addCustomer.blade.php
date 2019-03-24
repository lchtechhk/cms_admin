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
                      {!! Form::open(array('url' =>'admin/addNewCustomer', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!} 
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.FirstName') }} 
                            <span style="color:red">★</span>
                          </label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::text('customers_firstname',  '', array('class'=>'form-control field-validate', 'id'=>'customers_firstname')) !!}
                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                              {{ trans('labels.FirstNameText') }}
                            </span>
                            <span class="help-block hidden">
                              {{ trans('labels.textRequiredFieldMessage') }}
                            </span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.LastName') }} 
                              <span style="color:red">★</span>
                          </label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::text('customers_lastname',  '', array('class'=>'form-control field-validate', 'id'=>'customers_lastname')) !!}
                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                              {{ trans('labels.lastNameText') }}
                            </span>
                            <span class="help-block hidden">
                              {{ trans('labels.textRequiredFieldMessage') }}
                            </span>
                          </div>
                        </div> 
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Gender') }}</label>
                                <div class="col-sm-10 col-md-4">
                                    <label>
                                      <input type="radio" name="customers_gender" value="1" class="minimal" checked> {{ trans('labels.Male') }} 
                                    </label><br>

                                    <label>
                                      <input type="radio" name="customers_gender" value="0" class="minimal"> {{ trans('labels.Female') }}
                                    </label>
                                    
                                </div>
                          </div>                            
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Picture') }} </label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::file('newImage', array('id'=>'newImage')) !!}
                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                            {{ trans('labels.PictureText') }}</span>
                            <br>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.DOB') }} </label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::text('customers_dob',  '', array('class'=>'form-control datepicker' , 'id'=>'customers_dob')) !!}
                              <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                              {{ trans('labels.DOBText') }}</span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Telephone') }}</label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::text('customers_telephone',  '', array('class'=>'form-control', 'id'=>'customers_telephone')) !!}
                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                            {{ trans('labels.TelephoneText') }}</span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Fax') }}</label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::text('customers_fax',  '', array('class'=>'form-control', 'id'=>'customers_fax')) !!}
                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.FaxText') }}</span>
                          </div>
                        </div>
                        <hr>
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.EmailAddress') }} 
                              <span style="color:red">★</span>
                          </label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::text('email',  '', array('class'=>'form-control email-validate', 'id'=>'email')) !!}
                              <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                              {{ trans('labels.EmailText') }}</span>
                            <span class="help-block hidden"> {{ trans('labels.EmailError') }}</span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Password') }}
                              <span style="color:red">★</span>
                          </label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::password('password', array('class'=>'form-control field-validate', 'id'=>'password')) !!}
                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                            {{ trans('labels.PasswordText') }}</span>
                            <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Status') }}
                              <span style="color:red">★</span>
                          </label>
                          <div class="col-sm-10 col-md-4">
                            <select class='form-control field-validate' name="status">
                                  <option value="active">{{ trans('labels.Active') }}</option>
                                  <option value="active">{{ trans('labels.Inactive') }}</option>
                            </select>
                          <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                          {{ trans('labels.StatusText') }}</span>
                          </div>
                        </div>
                        <div class="box-footer text-center">
                          <button type="submit" class="btn btn-primary">{{ trans('labels.AddCustomer') }}</button>
                          <a href="{{ URL::to('admin/customers')}}" type="button" class="btn btn-default">{{ trans('labels.back') }}</a>
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