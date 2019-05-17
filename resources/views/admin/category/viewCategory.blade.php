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
                    @if ($result['operation'] == 'edit' || $result['operation'] == 'view_edit')
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Category_id') }}
                        <span style="color:red">★</span>
                      </label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::text('category_id', empty($result['category']->category_id) ? '' :
                        print_value($result['operation'],$result['category']->category_id),
                        array('class'=>'form-control', 'id'=>'category_id','readonly')) !!}
                      </div>
                    </div>
                    @endif

                    @foreach($result['languages'] as $language)
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">
                        {{ trans('labels.Name') }}
                        ({{ $language->name }})
                        <span style="color:red">★</span>
                      </label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::text("language_array[".$language->languages_id."]",
                        empty($result['category']->language_array[$language->languages_id]['name']) ? '' :
                        print_value($result['operation'],$result['category']->language_array[$language->languages_id]['name']),
                        array('class'=>'form-control
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
                        @if(!empty($result['category']->image))
                        <img width="150px" src="{{asset('').'/'.$result['category']->image}}" class="img-circle">
                        @else
                        <img width="150px" src="{{asset('').'/resources/assets/images/default_images/default.png' }}"
                          class="img-circle">
                        @endif
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Icon') }}</label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::file('icon', array('id'=>'icon')) !!}
                        <span class="help-block"
                          style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.CategoryIconText') }}</span>
                        <br>
                        @if(!empty($result['category']->icon))
                        <img width="150px" src="{{asset('').'/'.$result['category']->icon}}" class="img-circle">
                        @else
                        <img width="150px" src="{{asset('').'resources/assets/images/default_images/default.png' }}"
                          class="img-circle">
                        @endif
                      </div>
                    </div>
                    @if ($result['operation'] == 'edit' || $result['operation'] == 'view_edit')
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.CreateDate') }}<span
                          style="color:red">★</label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::text('create_date', empty($result['category']->create_date) ? '' :
                        print_value($result['operation'],$result['category']->create_date),
                        array('class'=>'form-control', 'id'=>'create_date','readonly'=>'true')) !!}
                        <span class="help-block"
                          style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.CreateDate') }}</span>
                        <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.EditDate') }}<span
                          style="color:red">★</label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::text('edit_date', empty($result['category']->edit_date) ? '' :
                        print_value($result['operation'],$result['category']->edit_date), array('class'=>'form-control',
                        'id'=>'edit_date','readonly'=>'true')) !!}
                        <span class="help-block"
                          style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.EditDate') }}</span>
                        <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                      </div>
                    </div>
                    @endif
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