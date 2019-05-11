@extends('admin.layout') @section('content')
<div class="content-wrapper">
@include('layouts/add_header')
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            @if ($result['operation'] == 'listing' || $result['operation'] == 'add' || $result['operation'] ==
            'view_add' )
            <h3 class="box-title">{{ trans('labels.Add'.$result['label']) }}</h3>
            @elseif ($result['operation'] == 'edit' || $result['operation'] == 'view_edit')
            <h3 class="box-title">{{ trans('labels.Edit'.$result['label']) }}</h3>
            @endif
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
                <div class="box box-info"><br>
                  @include('layouts/responseMessage')
                  <div class="box-body">
                    @if ($result['operation'] == 'listing' || $result['operation'] == 'add' || $result['operation'] ==
                    'view_add' )
                    {!! Form::open(array('url' =>'admin/addCategory', 'method'=>'post', 'class' => 'form-horizontal
                    form-validate', 'enctype'=>'multipart/form-data')) !!}
                    @elseif ($result['operation'] == 'edit' || $result['operation'] == 'view_edit')
                    {!! Form::open(array('url' =>'admin/updateCategory', 'method'=>'post', 'class' => 'form-horizontal
                    form-validate', 'enctype'=>'multipart/form-data')) !!}
                    @endif
                    @foreach($result['language'] as $language)
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Language') }}
                        <span style="color:red">★</span>
                      </label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::text('language', $language->languages_id, array('class'=>'form-control
                        field-validate', 'id'=>'language')) !!}
                        <span class="help-block"
                          style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.lastNameText') }}</span>
                        <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">
                        {{ trans('labels.Name') }}
                        ({{ $language->name }})
                        <span style="color:red">★</span>
                      </label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::text('name', empty($result['category']->name) ? '' :
                        print_value($result['operation'],$result['category']->name), array('class'=>'form-control
                        field-validate', 'id'=>'name')) !!}
                        <span class="help-block"
                          style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.CategoryName') }}({{ $language->name }})</span>
                        <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                      </div>
                    </div>
                    @endforeach

                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Image') }}</label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::file('image', array('id'=>'image')) !!}
                        <span class="help-block"
                          style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.CategoryImageText') }}</span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Icon') }}</label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::file('icon', array('id'=>'icon')) !!}
                        <span class="help-block"
                          style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.CategoryIconText') }}</span>
                        <br>
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