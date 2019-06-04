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
                                        {!! Form::open(array('url' =>'admin/addProduct', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                                    @elseif ($result['operation'] == 'edit' || $result['operation'] == 'view_edit')
                                        {!! Form::open(array('url' =>'admin/updateProduct', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                                    @endif

                                    {{-- Only Edit --}}
                                    @if ($result['operation'] == 'edit' || $result['operation'] == 'view_edit')
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Product_id') }}
                                                <span style="color:red">★</span>
                                            </label>
                                            <div class="col-sm-10 col-md-4">
                                                {!! Form::text('product_id', empty($result['product']->product_id) ? '' :
                                                print_value($result['operation'],$result['product']->product_id),
                                                array('class'=>'form-control', 'id'=>'product_id','readonly')) !!}
                                            </div>
                                        </div>
                                    @endif
                                    {{-- Content --}}
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Category') }}<span style="color:red">★</span></label>
                                        <div class="col-sm-10 col-md-4">
                                            <select class="form-control field-validate" id="sub_category_id" name="sub_category_id">
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

                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Image') }} </label>
                                        <div class="col-sm-10 col-md-4">
                                            {!! Form::file('image', array('id'=>'image')) !!}<span class="help-block"
                                            style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                            {{ trans('labels.UploadProductImageText') }}</span>
                                            <br>
                                            @if(!empty($result['product']->image))
                                                {!! Form::hidden('oldImage', empty($result['product']->image) ? '' : print_value($result['operation'],$result['product']->image) , array('id'=>'oldImage',
                                                'class'=>' ')) !!}
                                                <img src="{{asset('').$result['product']->image}}" alt="" width=" 100px">
                                            @else
                                                <img src="../resources/assets/images/default_images/product.png"
                                                style="width: 50px; float: left; margin-right: 10px">
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ProductStatus') }} <span style="color:red">★</span></label>
                                        <div class="col-sm-10 col-md-4">
                                            <select class="form-control field-validate" name="status" id="status">
                                                <option value="active"
                                                    @if(!empty($result['product']->status))
                                                        {{print_selected_value($result['operation'],'active',$result['product']->status)}}
                                                    @endif>
                                                    Active
                                                </option>
                                                <option value="inactive"
                                                    @if(!empty($result['product']->status))
                                                        {{print_selected_value($result['operation'],'inactive',$result['product']->status)}}
                                                    @endif>
                                                    Inactive
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr>  

                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 col-md-3 control-label">
                                            {{ trans('labels.ProductsPrice') }}
                                            <span style="color:red">★</span>
                                        </label>
                                        <div class="col-sm-10 col-md-4">
                                            {!! Form::text('price', empty($result['product']->price) ? '' : print_value($result['operation'],$result['product']->price),
                                            array('class'=>'form-control field-validate', 'id'=>'price')) !!}
                                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                            {{ trans('labels.ProductPriceText') }}
                                            </span>
                                            <span class="help-block hidden">{{ trans('labels.ProductPriceText') }}</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name"
                                            class="col-sm-2 col-md-3 control-label">{{ trans('labels.ProductsWeight') }}</label>
                                        <div class="col-sm-10 col-md-2">
                                            {!! Form::text('weight', empty($result['product']->weight) ? '' : print_value($result['operation'],$result['product']->weight),
                                            array('class'=>'form-control', 'id'=>'weight')) !!}
                                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                            {{ trans('labels.RequiredTextForWeight') }}
                                            </span>
                                        </div>
                                        <div class="col-sm-10 col-md-2" style="padding-left: 0;">
                                            <select class="form-control" name="products_weight_unit">
                                            @if(count($result['units'])>0)
                                            @foreach($result['units'] as $unit)
                                                <option value="{{$unit->name}}"
                                                    @if(!empty($result['product']->weight_unit))
                                                        {{print_selected_value($result['operation'],$unit->name,$result['product']->weight_unit)}}
                                                    @endif>
                                                    {{ $unit->name }}
                                                </option>
                                            @endforeach
                                            @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 col-md-3 control-label">
                                            {{ trans('labels.ProductsQuantity') }}
                                            <span style="color:red">★</span>
                                        </label>
                                        <div class="col-sm-10 col-md-4">
                                            {!! Form::text('quantity', empty($result['product']->quantity) ? '' : print_value($result['operation'],$result['product']->quantity),
                                            array('class'=>'form-control field-validate', 'id'=>'quantity')) !!}
                                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                            {{ trans('labels.ProductsQuantityText') }}
                                            </span>
                                            <span class="help-block hidden">{{ trans('labels.ProductsQuantityText') }}</span>
                                        </div>
                                    </div>
                    
                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.QuantityLowLimit') }}</label>
                                        <div class="col-sm-10 col-md-4">
                                            {!! Form::text('low_limit', empty($result['product']->low_limit) ? '' : print_value($result['operation'],$result['product']->low_limit),
                                            array('class'=>'form-control ', 'id'=>'low_limit')) !!}
                                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                            {{ trans('labels.QuantityLowLimitText') }}</span>
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
                                            <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.SpecialPrice') }}<span style="color:red">★</span></label>
                                            <div class="col-sm-10 col-md-4">
                                                {!! Form::text('special_price',
                                                empty($result['product']->special_price) ? '' : print_value($result['operation'],$result['product']->special_price), 
                                                array('class'=>'form-control field-validate','id'=>'special_price')) !!}
                                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                                    {{ trans('labels.SpecialPriceTxt') }}.
                                                </span>
                                            </div>
                                            <span class="help-block hidden">{{ trans('labels.SpecialPriceNote') }}.</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ExpiryDate') }}<span style="color:red">★</span></label> 
                                            <div class="col-sm-10 col-md-4">
                                                {!! Form::text('expires_date', 
                                                empty($result['product']->special_price) ? '' : print_value($result['operation'],$result['product']->special_price),
                                                array('class'=>'form-control datepicker field-validate','id'=>'expires_date')) !!}
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
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ProductName') }} ({{ $language->name}})
                                                <span style="color:red">★</span>
                                            </label>
                                            <div class="col-sm-10 col-md-4">
                                                    {!! Form::text("language_array[".$language->languages_id."][name]",
                                                    empty($result['product']->language_array[$language->languages_id]['name']) ? '' :
                                                    print_value($result['operation'],$result['product']->language_array[$language->languages_id]['name']),
                                                    array('class'=>'form-control field-validate
                                                    ', 'id'=>'name')) !!}
                                            <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                                {{ trans('labels.EnterProductNameIn') }} {{ $language->name }} </span>
                                            <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Description') }} ({{ $language->name }})</label>
                                            <div class="col-sm-10 col-md-8">
                                                    {!! Form::textarea("language_array[".$language->languages_id."][description]",
                                                    empty($result['product']->language_array[$language->languages_id]['description']) ? '' :
                                                    print_value($result['operation'],$result['product']->language_array[$language->languages_id]['description']),
                                                    array('class'=>'form-control field-validate
                                                    ', 'id'=>'description')) !!}
                                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                                {{ trans('labels.EnterProductDetailIn') }} {{ $language->name }}</span>
                                            </div>
                                        </div>
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