@extends('admin.layoutLlogin')
@section('content')
<style>
    .wrapper {
        display: none !important;
    }
</style>
<div style="margin: 7% auto;">
    <!-- /.login-logo -->
    <div class="login-box-body">
        <div class="form-group has-feedback">
            <div class="box-body">
                {!! Form::open(array('url' =>'admin/add_registerCompany', 'method'=>'post', 'class' =>
                    'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                    {{-- Content --}}
                    @foreach($result['languages'] as $language)
                        <div class="form-group">
                            <label for="name" class="col-sm-2 col-md-3 control-label">
                                {{ trans('labels.Name') }}
                                ({{ $language->name}})
                                <span style="color:red">★</span>
                            </label>
                            <div class="col-sm-10 col-md-4">
                                {!! Form::text("language_array[".$language->languages_id."]",
                                empty($result['company']->language_array[$language->languages_id]['name']) ? '' :
                                print_value($result['operation'],$result['company']->language_array[$language->languages_id]['name']),
                                array('class'=>'form-control
                                field-validate', 'id'=>'name')) !!}
                                <span class="help-block"
                                    style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.companyName') }}({{ $language->name}})</span>
                                <span
                                    class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                            </div>
                        </div>
                    @endforeach
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.EmailAddress') }}
                            <span style="color:red">★</span>
                        </label>
                        <div class="col-sm-10 col-md-4">
                            {!! Form::email('email', 
                            empty($result['company']->email) ? '' :  print_value($result['operation'],$result['company']->email)
                            , array('class'=>'form-control
                            email-validate', 'id'=>'email')) !!}
                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                {{ trans('labels.EmailText') }}</span>
                            <span class="help-block hidden"> {{ trans('labels.EmailError') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Picture') }}</label>
                        <div class="col-sm-10 col-md-4">
                            {!! Form::file('newImage', array('id'=>'newImage')) !!}
                            <span class="help-block"
                                style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.PictureText') }}</span>
                            <br>
                            {!! Form::hidden('oldImage', empty($result['company']->image) ? '' : $result['company']->image,
                            array('id'=>'oldImage')) !!}
                            @if(!empty($result['company']->image))
                            <img width="150px" src="{{asset('').'/'.$result['company']->image}}" class="img-circle">
                            @else
                            <img width="150px" src="{{asset('').'/resources/assets/images/default_images/company.png' }}" class="img-circle">
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Telephone') }}</label>
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('phone', empty($result['company']->phone) ? '' :  print_value($result['operation'],$result['company']->phone),
                            array('class'=>'form-control', 'id'=>'phone')) !!}
                            <span class="help-block"
                                style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.TelephoneText') }}</span>
                        </div>
                    </div>
                    {{-- Language Content --}}
                    <div class="form-group">
                        <div class="col-sm-2 col-md-3 control-label"></div>
                        <div class="col-sm-10 col-md-4">
                            <button id="add_registerCompany" type="submit" class="btn btn-primary">Add</button>
                            <a href="{{ URL::to('admin/login')}}" type="button" class="btn btn-default">{{ trans('labels.back') }}</a>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>