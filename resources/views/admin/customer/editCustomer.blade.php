@extends('admin.layout') @section('content')
@include('generic/view_function')
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
                    {!! Form::open(array('url' =>'admin/editCustomer', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                        {!! Form::hidden('id',  $result['customers'][0]->id, array('class'=>'form-control', 'id'=>'id')) !!}
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.FirstName') }} 
                            <span style="color:red">★</span>
                          </label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::text('customers_firstname',  $result['customers'][0]->customers_firstname, array('class'=>'form-control field-validate', 'id'=>'customers_firstname')) !!}
                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.FirstNameText') }}</span>
                            <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.LastName') }} 
                              <span style="color:red">★</span>
                          </label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::text('customers_lastname',  $result['customers'][0]->customers_lastname, array('class'=>'form-control field-validate', 'id'=>'customers_lastname')) !!}
                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.lastNameText') }}</span>
                            <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                          </div>
                        </div> 
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Gender') }}</label>
                          <div class="col-sm-10 col-md-4">
                            <label>
                              <input @if($result['customers'][0]->customers_gender == 1 or empty($result['customers'][0]->customers_gender)) checked @endif type="radio" name="customers_gender" value="1" class="minimal" checked > {{ trans('labels.Male') }}  
                            </label><br>

                            <label>
                              <input @if( !empty($result['customers'][0]->customers_gender) and $result['customers'][0]->customers_gender == 0) checked  @endif type="radio" name="customers_gender" value="0" class="minimal"> {{ trans('labels.Female') }}
                            </label>
                          </div>
                        </div>                            
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Picture') }}</label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::file('newImage', array('id'=>'newImage')) !!}
                          <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.PictureText') }}</span>
                          <br>
                            {!! Form::hidden('oldImage', $result['customers'][0]->customers_picture, array('id'=>'oldImage')) !!}
                            @if(!empty($result['customers'][0]->customers_picture))
                                <img width="150px" src="{{asset('').'/'.$result['customers'][0]->customers_picture}}" class="img-circle">
                            @else
                                <img width="150px" src="{{asset('').'/resources/assets/images/default_images/user.png' }}" class="img-circle">
                            @endif
                          </div>
                        </div>                
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.DOB') }}</label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::text('customers_dob',  $result['customers'][0]->customers_dob, array('class'=>'form-control datepicker' , 'id'=>'customers_dob')) !!}
                          <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.DOBText') }}</span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Telephone') }}</label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::text('customers_telephone',  $result['customers'][0]->customers_telephone, array('class'=>'form-control', 'id'=>'customers_telephone')) !!}
                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.TelephoneText') }}</span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Fax') }}</label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::text('customers_fax',  $result['customers'][0]->customers_fax, array('class'=>'form-control', 'id'=>'customers_fax')) !!}
                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.FaxText') }}</span>
                          </div>
                        </div>
                        <hr>
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.EmailAddress') }} 
                              <span style="color:red">★</span>
                          </label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::email('email',  $result['customers'][0]->email, array('class'=>'form-control email-validate', 'id'=>'email')) !!}
                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"> {{ trans('labels.EmailText') }}</span>
                            <span class="help-block hidden"> {{ trans('labels.EmailError') }}</span>
                          </div>
                        </div>                                                               
                        <div class="form-group">
                            <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Password') }}
                                <span style="color:red">★</span>
                            </label>
                            <div class="col-sm-10 col-md-4">
                              {!! Form::password('password', array('class'=>'form-control ', 'id'=>'password')) !!}
                              <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                {{ trans('labels.PasswordText') }}
                              </span>
                              <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Status') }}
                              <span style="color:red">★</span>
                          </label>
                          <div class="col-sm-10 col-md-4">
                            <select class="form-control" name="status">
                              <option value="active" {{print_selected_value('active',$result['customers'][0]->status)}}>{{ trans('labels.Active') }}</option>
                              <option value="inactive" {{print_selected_value('inactive',$result['customers'][0]->status)}}>{{ trans('labels.Inactive') }}</option>
                            </select>
                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.StatusText') }}</span>
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
  </section>
</div>
@endsection 