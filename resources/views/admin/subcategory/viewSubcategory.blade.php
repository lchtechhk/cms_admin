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
                                        @if ($result['operation'] == 'listing' || $result['operation'] == 'add' ||
                                        $result['operation'] == 'view_add' )
                                        {!! Form::open(array('url' =>'admin/addSubCategory', 'method'=>'post', 'class'
                                        => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                                        @elseif ($result['operation'] == 'edit' || $result['operation'] == 'view_edit')
                                        {!! Form::open(array('url' =>'admin/updateSubCategory', 'method'=>'post',
                                        'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data'))
                                        !!}
                                        @endif
                                        @if ($result['operation'] == 'edit' || $result['operation'] == 'view_edit')
                                        <div class="form-group">
                                            <label for="name"
                                                class="col-sm-2 col-md-3 control-label">{{ trans('labels.SubCategory_id') }}
                                                <span style="color:red">★</span>
                                            </label>
                                            <div class="col-sm-10 col-md-4">
                                                {!! Form::text('sub_category_id',
                                                empty($result['sub_category']->sub_category_id) ? '' :
                                                print_value($result['operation'],$result['sub_category']->sub_category_id),
                                                array('class'=>'form-control', 'id'=>'sub_category_id','readonly')) !!}
                                            </div>
                                        </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="name"
                                                class="col-sm-2 col-md-3 control-label">{{ trans('labels.Category_id') }}
                                                <span style="color:red">★</span>
                                            </label>
                                            <div class="col-sm-10 col-md-4">
                                                <select name="category_id" class='form-control field-validate'>
                                                    @foreach( $result['categories'] as $category)
                                                    <option value="{{ $category->category_id }}"
                                                        @if(!empty($result['sub_category']->category_id))
                                                        {{print_selected_value($result['operation'],$category->category_id,$result['sub_category']->category_id)}}
                                                        @endif>
                                                        {{ $category->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @foreach($result['languages'] as $language)
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 col-md-3 control-label">
                                                {{ trans('labels.Name') }}
                                                ({{ $language->name }})
                                                <span style="color:red">★</span>
                                            </label>
                                            <div class="col-sm-10 col-md-4">
                                                {!! Form::text("language_array[".$language->languages_id."]",
                                                empty($result['sub_category']->language_array[$language->languages_id]['sub_category_name'])
                                                ? '' :
                                                print_value($result['operation'],$result['sub_category']->language_array[$language->languages_id]['sub_category_name']),
                                                array('class'=>'form-control
                                                field-validate', 'id'=>'name')) !!}
                                                <span class="help-block"
                                                    style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.SubCategoryName') }}({{ $language->name }})</span>
                                                <span
                                                    class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                                            </div>
                                        </div>
                                        @endforeach

                                        <div class="form-group">
                                            <label for="name"
                                                class="col-sm-2 col-md-3 control-label">{{ trans('labels.Image') }}</label>
                                            <div class="col-sm-10 col-md-4">
                                                {!! Form::file('image', array('id'=>'image')) !!}
                                                <span class="help-block"
                                                    style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.CategoryImageText') }}</span>
                                                @if(!empty($result['sub_category']->image))
                                                <img width="150px"
                                                    src="{{asset('').'/'.$result['sub_category']->image}}"
                                                    class="img-circle">
                                                @else
                                                <img width="150px"
                                                    src="{{asset('').'/resources/assets/images/default_images/default.png' }}"
                                                    class="img-circle">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name"
                                                class="col-sm-2 col-md-3 control-label">{{ trans('labels.Icon') }}</label>
                                            <div class="col-sm-10 col-md-4">
                                                {!! Form::file('icon', array('id'=>'icon')) !!}
                                                <span class="help-block"
                                                    style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.CategoryIconText') }}</span>
                                                <br>
                                                @if(!empty($result['sub_category']->icon))
                                                <img width="150px" src="{{asset('').'/'.$result['sub_category']->icon}}"
                                                    class="img-circle">
                                                @else
                                                <img width="150px"
                                                    src="{{asset('').'resources/assets/images/default_images/default.png' }}"
                                                    class="img-circle">
                                                @endif
                                            </div>
                                        </div>

                                        @if ($result['operation'] == 'edit' || $result['operation'] == 'view_edit')
                                        <div class="form-group">
                                            <label for="name"
                                                class="col-sm-2 col-md-3 control-label">{{ trans('labels.CreateDate') }}<span
                                                    style="color:red">★</label>
                                            <div class="col-sm-10 col-md-4">
                                                {!! Form::text('create_date',
                                                empty($result['sub_category']->create_date) ? '' :
                                                print_value($result['operation'],$result['sub_category']->create_date),
                                                array('class'=>'form-control', 'id'=>'create_date','readonly'=>'true'))
                                                !!}
                                                <span class="help-block"
                                                    style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.CreateDate') }}</span>
                                                <span
                                                    class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name"
                                                class="col-sm-2 col-md-3 control-label">{{ trans('labels.EditDate') }}<span
                                                    style="color:red">★</label>
                                            <div class="col-sm-10 col-md-4">
                                                {!! Form::text('edit_date', empty($result['sub_category']->edit_date) ?
                                                '' :
                                                print_value($result['operation'],$result['sub_category']->edit_date),
                                                array('class'=>'form-control',
                                                'id'=>'edit_date','readonly'=>'true')) !!}
                                                <span class="help-block"
                                                    style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.EditDate') }}</span>
                                                <span
                                                    class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
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