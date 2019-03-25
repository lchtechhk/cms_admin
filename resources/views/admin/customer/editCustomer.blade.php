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
                    {!! Form::open(array('url' =>'admin/updatecustomers', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                        {!! Form::hidden('id',  $data['customers'][0]->id, array('class'=>'form-control', 'id'=>'id')) !!}
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.FirstName') }} </label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::text('customers_firstname',  $data['customers'][0]->customers_firstname, array('class'=>'form-control field-validate', 'id'=>'customers_firstname')) !!}
                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.FirstNameText') }}</span>
                            <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.LastName') }}</label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::text('customers_lastname',  $data['customers'][0]->customers_lastname, array('class'=>'form-control field-validate', 'id'=>'customers_lastname')) !!}
                          <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.lastNameText') }}</span>
                            <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                          </div>
                        </div> 
                        <div class="form-group">
                            <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Gender') }}</label>
                          <div class="col-sm-10 col-md-4">
                                <label>
                                  <input @if($data['customers'][0]->customers_gender == 1 or empty($data['customers'][0]->customers_gender)) checked @endif type="radio" name="customers_gender" value="1" class="minimal" checked > {{ trans('labels.Male') }}  
                                </label><br>

                                <label>
                                  <input @if( !empty($data['customers'][0]->customers_gender) and $data['customers'][0]->customers_gender == 0) checked  @endif type="radio" name="customers_gender" value="0" class="minimal"> {{ trans('labels.Female') }}
                                </label>
                          </div>
                        </div>                            
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Picture') }}</label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::file('newImage', array('id'=>'newImage')) !!}
                          <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.PictureText') }}</span>
                          <br>
                            {!! Form::hidden('oldImage', $data['customers'][0]->customers_picture, array('id'=>'oldImage')) !!}
                          <!-- <img src="{{asset('').$data['customers'][0]->customers_picture}}" alt="" width=" 100px">-->
                            @if(!empty($data['customers'][0]->customers_picture))
                                <img width="150px" src="{{asset('').'/'.$data['customers'][0]->customers_picture}}" class="img-circle">
                            @else
                                <img width="150px" src="{{asset('').'/resources/assets/images/default_images/user.png' }}" class="img-circle">
                            @endif
                          </div>
                        </div>                
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.DOB') }}</label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::text('customers_dob',  $data['customers'][0]->customers_dob, array('class'=>'form-control datepicker' , 'id'=>'customers_dob')) !!}
                          <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.DOBText') }}</span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Telephone') }}</label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::text('customers_telephone',  $data['customers'][0]->customers_telephone, array('class'=>'form-control', 'id'=>'customers_telephone')) !!}
                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.TelephoneText') }}</span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Fax') }}</label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::text('customers_fax',  $data['customers'][0]->customers_fax, array('class'=>'form-control', 'id'=>'customers_fax')) !!}
                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.FaxText') }}</span>
                          </div>
                        </div>
                        <hr>
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.EmailAddress') }} </label>
                          <div class="col-sm-10 col-md-4">
                          {!! Form::hidden('old_email_address',  $data['customers'][0]->email, array('class'=>'form-control', 'id'=>'old_email_address')) !!}
                            {!! Form::email('email',  $data['customers'][0]->email, array('class'=>'form-control email-validate', 'id'=>'email')) !!}
                          <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"> {{ trans('labels.EmailText') }}</span>
                        
                            <span class="help-block hidden"> {{ trans('labels.EmailError') }}</span>
                          </div>
                        </div>                                                               
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.changePassword') }}</label>
                          <div class="col-sm-10 col-md-4">
                            {!! Form::checkbox('changePassword', 'yes', null, ['class' => '', 'id'=>'change-passowrd']) !!}
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Password') }}</label>
                            <div class="col-sm-10 col-md-4">
                              {!! Form::password('password', array('class'=>'form-control ', 'id'=>'password')) !!}
                              <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                            {{ trans('labels.PasswordText') }}</span>
                              <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Status') }}
                          </label>
                          <div class="col-sm-10 col-md-4">
                            <select class="form-control" name="isActive">
                                  <option
                                      @if($data['customers'][0]->isActive == 1)
                                        selected
                                      @endif
                                  value="1">{{ trans('labels.Active') }}</option>
                                  <option 
                                  @if($data['customers'][0]->isActive == 0)
                                        selected
                                      @endif
                                  value="0">{{ trans('labels.Inactive') }}</option>
                            </select><span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.StatusText') }}</span>
                        
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