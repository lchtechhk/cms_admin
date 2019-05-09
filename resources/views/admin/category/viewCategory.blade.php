@extends('admin.layout') @section('content')
<div class="content-wrapper">
@include('layouts/add_header')
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            @if ($result['operation'] == 'listing' || $result['operation'] == 'add' )
              <h3 class="box-title">{{ trans('labels.Add'.$result['label']) }}</h3>
            @elseif ($result['operation'] == 'edit')
              <h3 class="box-title">{{ trans('labels.Edit'.$result['label']) }}</h3>
            @endif
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
                <div class="box box-info"><br>
                  @include('layouts/responseMessage')
                  <div class="box-body">
                    @if ($result['operation'] == 'listing' || $result['operation'] == 'add' )
                      {!! Form::open(array('url' =>'admin/addCategory', 'method'=>'post', 'class' => 'form-horizontal
                      form-validate', 'enctype'=>'multipart/form-data')) !!}
                    @elseif ($result['operation'] == 'edit')
                      {!! Form::open(array('url' =>'admin/updateCategory', 'method'=>'post', 'class' => 'form-horizontal
                      form-validate', 'enctype'=>'multipart/form-data')) !!}
                    @endif
                    @foreach($result['language'] as $language)
                      <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">
                          {{ trans('labels.Name') }}
                          ({{ $language->name }})
                        </label>
                        <div class="col-sm-10 col-md-4">
                          <input type="text" name="categoryName_<?=$language->languages_id?>"
                            class="form-control field-validate">
                          <span class="help-block"
                            style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.CategoryName') }}
                            ({{ $language->name }}).</span>
                          <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                        </div>
                      </div>
                    @endforeach

                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Image') }}</label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::file('newImage', array('id'=>'newImage')) !!}
                        <span class="help-block"
                          style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.CategoryImageText') }}</span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Icon') }}</label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::file('newIcon', array('id'=>'newIcon')) !!}
                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                          {{ trans('labels.CategoryIconText') }}</span>
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