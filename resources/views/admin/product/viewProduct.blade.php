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
                                    @if ($result['operation'] == 'listing' || $result['operation'] == 'add' || $result['operation'] == 'view_add' )
                                        {!! Form::open(array('url' =>'admin/viewProduct', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                                    @elseif ($result['operation'] == 'edit' || $result['operation'] == 'view_edit')
                                        {!! Form::open(array('url' =>'admin/viewProduct', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                                    @endif

                                    {{-- Only Edit --}}
                                    @if ($result['operation'] == 'edit' || $result['operation'] == 'view_edit')
                                        
                                    @endif
                                    {{-- Content --}}
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Category') }}</label>
                                        <div class="col-sm-10 col-md-4">
                                            <select class="form-control field-validate" id="category_id" name="category_id">
                                                @foreach ($result['view_sub_categories'] as $view_sub_category)
                                                    <option value="{{ $view_sub_category->sub_category_id }}"
                                                        @if(!empty($result['product']->sub_category_id))
                                                            {{print_selected_value($result['operation'],$view_sub_category->sub_category_id,$result['product']->sub_category_id)}}
                                                        @endif>
                                                        {{ $view_sub_category->category_name }} | {{ $view_sub_category->sub_category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                            {{ trans('labels.ChooseCatgoryText') }}.</span>
                                            <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Manufacturers') }} </label>
                                        <div class="col-sm-10 col-md-4">
                                            <select class="form-control" name="manufacturer_id" id="manufacturer_id">
                                                @foreach ($result['view_manufacturers'] as $view_manufacturer)
                                                    <option value="{{ $view_manufacturer->manufacturer_id }}"
                                                        @if(!empty($result['product']->manufacturer_id))
                                                            {{print_selected_value($result['operation'],$view_manufacturer->manufacturer_id,$result['product']->manufacturer_id)}}
                                                        @endif>
                                                        {{ $view_manufacturer->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.ChooseManufacturerText') }}..</span>
                                        </div>
                                    </div>

                                    <hr>  
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Special') }} </label>
                                        <div class="col-sm-10 col-md-4">
                                            <select class="form-control" onChange="showSpecial()" name="special_status" id="special_status">
                                                <option value="active"
                                                    @if(!empty($result['product']->special_status))
                                                        {{print_selected_value($result['operation'],"active",$result['product']->special_status)}}
                                                    @endif>
                                                    Active
                                                </option>
                                                <option value="cancel"
                                                    @if(!empty($result['product']->special_status))
                                                        {{print_selected_value($result['operation'],"active",$result['product']->special_status)}}
                                                    @endif>
                                                    Inactive
                                                </option>
                                            </select>
                                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                            {{ trans('labels.SpecialProductText') }}</span>
                                        </div>
                                    </div>
      
                                    <div class="special-container" style="display: none;">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.SpecialPrice') }}</label>
                                            <div class="col-sm-10 col-md-4">
                                                {!! Form::text('special_price',
                                                empty($result['product']->special_price) ? '' : print_value($result['operation'],$result['product']->special_price), 
                                                array('class'=>'form-control','id'=>'special_price')) !!}
                                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                                    {{ trans('labels.SpecialPriceTxt') }}.
                                                </span>
                                            </div>
                                            <span class="help-block hidden">{{ trans('labels.SpecialPriceNote') }}.</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ExpiryDate') }}</label> 
                                            <div class="col-sm-10 col-md-4">
                                                {!! Form::text('expires_date', 
                                                empty($result['product']->special_price) ? '' : print_value($result['operation'],$result['product']->special_price),
                                                array('class'=>'form-control datepicker','id'=>'expires_date')) !!}
                                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                                    {{ trans('labels.SpecialExpiryDateTxt') }}
                                                </span>
                                                <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    {{-- Language Content --}}
                                    @foreach($result['languages'] as $language)
                                    {{$language_id = $language->languages_id}}
                                    {{$language_name = $language->name}}
                                    
                                    @endforeach

                                    
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