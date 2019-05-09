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
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="box box-info">
                          <br>
                          @if (count($errors) > 0)
                          @if($errors->any())
                          <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                            {{$errors->first()}}
                          </div>
                          @endif
                          @endif
                          <!--<div class="box-header with-border">
                          <h3 class="box-title">Edit category</h3>
                        </div>-->
                          <!-- /.box-header -->
                          <!-- form start -->
                          <div class="box-body">

                            {!! Form::open(array('url' =>'admin/updatecategory', 'method'=>'post', 'class' =>
                            'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}

                            {!! Form::hidden('id', $result['editCategory'][0]->id , array('class'=>'form-control',
                            'id'=>'id')) !!}
                            {!! Form::hidden('oldImage', $result['editCategory'][0]->image , array('id'=>'oldImage'))
                            !!}
                            {!! Form::hidden('oldIcon', $result['editCategory'][0]->icon , array('id'=>'oldIcon')) !!}


                            @foreach($result['description'] as $description_data)
                            <div class="form-group">
                              <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Name') }}
                                ({{ $description_data['language_name'] }})</label>
                              <div class="col-sm-10 col-md-4">
                                <input type="text" name="category_name_<?=$description_data['languages_id']?>"
                                  class="form-control field-validate" value="{{$description_data['name']}}">
                                <span class="help-block"
                                  style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.CategoryName') }}
                                  ({{ $description_data['language_name'] }}).</span>
                                <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                              </div>
                            </div>

                            @endforeach

                            <div class="form-group">
                              <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.slug') }}
                              </label>
                              <div class="col-sm-10 col-md-4">
                                <input type="hidden" name="old_slug" value="{{$result['editCategory'][0]->slug}}">
                                <input type="text" name="slug" class="form-control field-validate"
                                  value="{{$result['editCategory'][0]->slug}}">
                                <span class="help-block"
                                  style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;">{{ trans('labels.slugText') }}</span>
                                <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="name"
                                class="col-sm-2 col-md-3 control-label">{{ trans('labels.Image') }}</label>
                              <div class="col-sm-10 col-md-4">
                                {!! Form::file('newImage', array('id'=>'newImage')) !!}<br>

                                <img src="{{asset('').$result['editCategory'][0]->image}}" alt="" width=" 100px">
                                <span class="help-block"
                                  style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.CategoryImageText') }}</span>

                              </div>
                            </div>

                            <div class="form-group">
                              <label for="name"
                                class="col-sm-2 col-md-3 control-label">{{ trans('labels.Icon') }}</label>
                              <div class="col-sm-10 col-md-4">
                                {!! Form::file('newIcon', array('id'=>'newIcon')) !!}
                                <span class="help-block"
                                  style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.CategoryIconText') }}</span><br>
                                <img src="{{asset('').$result['editCategory'][0]->icon}}" alt="" width=" 100px">
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