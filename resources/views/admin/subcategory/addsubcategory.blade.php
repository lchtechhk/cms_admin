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
                  {{-- <div class="box-body">
                    {!! Form::open(array('url' =>'admin/addSubCategory', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                      <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Category') }}</label>
                        <div class="col-sm-10 col-md-4">
                          <select class="form-control" name="parent_id">
                            @foreach ($result['categories'] as $categories)
                            <option value="{{$categories->mainId}}">{{$categories->mainName}}</option>
                            @endforeach
                          </select>
                          <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                            {{ trans('labels.ChooseMainCategory') }}</span>
                        </div>
                      </div>

                      @foreach($result['languages'] as $languages)
                        <div class="form-group">
                          <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Name') }}
                            ({{ $languages->name }})</label>
                          <div class="col-sm-10 col-md-4">
                            <input name="categoryName_<?=$languages->languages_id?>" class="form-control field-validate">
                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                              {{ trans('labels.SubCategoryName') }} ({{ $languages->name }}).</span>
                            <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>

                          </div>
                        </div>
                      @endforeach

                      <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Image') }}</label>
                        <div class="col-sm-10 col-md-4">
                          {!! Form::file('newImage', array('id'=>'newImage')) !!}
                          <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                            {{ trans('labels.UploadSubCategoryImage') }}</span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Icon') }}
                        </label>
                        <div class="col-sm-10 col-md-4">
                          {!! Form::file('newIcon', array('id'=>'newIcon')) !!}
                          <span class="help-block"
                            style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.UploadSubCategoryIcon') }}</span>
                        </div>
                      </div>
                      @include('layouts/submit_back_button')
                    {!! Form::close() !!}
                  </div> --}}
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