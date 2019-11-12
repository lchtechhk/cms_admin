@extends('admin.layout') @section('content')
<div class="content-wrapper">
    @include('layouts/add_header')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-info"><br>
                                @include('layouts/responseMessage')
                                <div class="box-body">
                                    @if ($result['operation'] == 'listing' || $result['operation'] == 'add' ||
                                        $result['operation'] == 'view_add' )
                                        {!! Form::open(array('url' =>'admin/addUser', 'method'=>'post', 'class' =>
                                        'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                                    @elseif ($result['operation'] == 'edit' || $result['operation'] == 'view_edit')
                                        {!! Form::open(array('url' =>'admin/updateUser', 'method'=>'post', 'class' =>
                                        'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                                    @endif
                                    {{-- Only Edit --}}
                                    @if ($result['operation'] == 'edit' || $result['operation'] == 'view_edit')
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Product_id') }}
                                                <span style="color:red">★</span>
                                            </label>
                                            <div class="col-sm-10 col-md-4">
                                                {!! Form::text('user_id', empty($result['user']->user_id) ? '' :
                                                print_value($result['operation'],$result['user']->user_id),
                                                array('class'=>'form-control', 'id'=>'user_id','readonly')) !!}
                                            </div>
                                        </div>
                                    @endif
                                {{-- Content --}}
                                <div class="form-group">
                                    <label for="name"
                                        class="col-sm-2 col-md-3 control-label">{{ trans('labels.Permission') }}<span
                                            style="color:red">★</span></label>
                                    <div class="col-sm-10 col-md-4">
                                        <select class="form-control field-validate" id="permission" name="permission">
                                            <option value="">-</option>
                                            @foreach ($result['permissions'] as $permission)
                                            <option value="{{ $permission->name }}" 
                                                {{Log::info('user : ' . json_encode($result['user']))}}
                                                @if(!empty($result['user']->permission))
                                                    {{print_selected_value($result['operation'],$permission->name,$result['user']->permission)}}
                                                @endif>
                                                {{ $permission->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <span class="help-block"
                                            style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                            {{ trans('labels.ChoosePermissionText') }}.</span>
                                        <span
                                            class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name"
                                        class="col-sm-2 col-md-3 control-label">{{ trans('labels.FirstName') }}
                                        <span style="color:red">★</span>
                                    </label>
                                    <div class="col-sm-10 col-md-4">
                                        {!! Form::text('first_name', empty($result['user']->first_name) ? '' :  print_value($result['operation'],$result['user']->first_name),
                                        array('class'=>'form-control field-validate', 'id'=>'first_name')) !!}
                                        <span class="help-block"
                                            style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.FirstNameText') }}</span>
                                        <span
                                            class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name"
                                        class="col-sm-2 col-md-3 control-label">{{ trans('labels.LastName') }}
                                        <span style="color:red">★</span>
                                    </label>
                                    <div class="col-sm-10 col-md-4">
                                        {!! Form::text('last_name', empty($result['user']->last_name) ? '' :  print_value($result['operation'],$result['user']->last_name),
                                        array('class'=>'form-control field-validate', 'id'=>'last_name')) !!}
                                        <span class="help-block"
                                            style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.lastNameText') }}</span>
                                        <span
                                            class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Gender') }}</label>
                                    <div class="col-sm-10 col-md-4">
                                        <label>
                                            <input type="radio" name="gender" value="M" class="minimal"
                                            @if(!empty($result['user']->gender))
                                            {{print_radio_value($result['operation'],"M",$result['user']->gender)}}
                                            @endif>
                                            {{ trans('labels.Female') }}
                                        </label>
                                        <br>
                                        <label>
                                            <input  type="radio" name="gender" value="F" class="minimal"
                                            @if(!empty($result['user']->gender))
                                            {{print_radio_value($result['operation'],"F",$result['user']->gender)}}
                                            @endif>
                                            {{ trans('labels.Male') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Picture') }}</label>
                                    <div class="col-sm-10 col-md-4">
                                        {!! Form::file('newImage', array('id'=>'newImage')) !!}
                                        <span class="help-block"
                                            style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.PictureText') }}</span>
                                        <br>
                                        {!! Form::hidden('oldImage', empty($result['user']->image) ? '' : $result['user']->image,
                                        array('id'=>'oldImage')) !!}
                                        @if(!empty($result['user']->image))
                                        <img width="150px" src="{{asset('').'/'.$result['user']->image}}" class="img-circle">
                                        @else
                                        <img width="150px" src="{{asset('').'/resources/assets/images/default_images/user.png' }}" class="img-circle">
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.DOB') }}</label>
                                    <div class="col-sm-10 col-md-4">
                                        {!! Form::text('dob', empty($result['user']->dob) ? '' :  print_value($result['operation'],$result['user']->dob),
                                        array('class'=>'form-control datepicker' , 'id'=>'dob')) !!}
                                        <span class="help-block"
                                            style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.DOBText') }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Telephone') }}</label>
                                    <div class="col-sm-10 col-md-4">
                                        {!! Form::text('phone', empty($result['user']->phone) ? '' :  print_value($result['operation'],$result['user']->phone),
                                        array('class'=>'form-control', 'id'=>'phone')) !!}
                                        <span class="help-block"
                                            style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.TelephoneText') }}</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.EmailAddress') }}
                                        <span style="color:red">★</span>
                                    </label>
                                    <div class="col-sm-10 col-md-4">
                                        {!! Form::email('email', 
                                        empty($result['user']->email) ? '' :  print_value($result['operation'],$result['user']->email)
                                        , array('class'=>'form-control
                                        email-validate', 'id'=>'email')) !!}
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
                                        {!! Form::password('password',  array('class'=>'form-control ', 'id'=>'password')) !!}
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
                                            <option value="active" 
                                            @if (!empty($result['user']->status)){{print_selected_value($result['operation'],'active',$result['user']->status)}} @endIf>
                                                {{ trans('labels.Active') }}</option>
                                            <option value="inactive"
                                            @if (!empty($result['user']->status)){{print_selected_value($result['operation'],'inactive',$result['user']->status)}}@endIf>
                                                {{ trans('labels.Inactive') }}</option>
                                        </select>
                                        <span class="help-block"
                                            style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.StatusText') }}</span>
                                    </div>
                                </div>
                                
                            {{-- Language Content --}}
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

<script type="text/javascript">
    $(function () {
        

        
    });
</script>

@endsection