@include('generic/view_function')
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="productAuttributeLabel">{{ trans('labels.AddProductAuttribute') }}</h4>
        </div>

        <div class="box-body">
            @if ($result['operation'] == 'listing' || $result['operation'] == 'add' ||
            $result['operation'] == 'view_add' )
            {!! Form::open(array('url' =>'admin/addProductAttribute', 'method'=>'post',
            'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
            @elseif ($result['operation'] == 'edit' || $result['operation'] == 'view_edit')
            {!! Form::open(array('url' =>'admin/updateProductAttribute', 'method'=>'post',
            'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
            @endif

            <div class="form-group">
                <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ProductId') }}
                    <span style="color:red">★</span>
                </label>
                <div class="col-sm-10 col-md-4">
                    {!! Form::text('product_id', empty($result['product_id']) ? '' :
                    print_value('listing',$result['product_id']),
                    array('class'=>'form-control', 'id'=>'product_id','readonly')) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ProductName') }}
                    <span style="color:red">★</span>
                </label>
                <div class="col-sm-10 col-md-4">
                    {!! Form::text('product_name', empty($result['product']->name) ? '' :
                    print_value('listing',$result['product']->name),
                    array('class'=>'form-control', 'id'=>'product_name','readonly')) !!}
                </div>
            </div>
            {{-- Only Edit --}}
            @if ($result['operation'] == 'edit' || $result['operation'] == 'view_edit')
                <div class="form-group">
                    <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.AttributeId') }}
                        <span style="color:red">★</span>
                    </label>
                    <div class="col-sm-10 col-md-4">
                        {!! Form::text('product_attribute_id', empty($result['product_attribute']->product_attribute_id) ? '' :
                        print_value($result['operation'],$result['product_attribute']->product_attribute_id),
                        array('class'=>'form-control', 'id'=>'product_attribute_id','readonly')) !!}
                    </div>
                </div>
            @endif
            {{-- Content --}}

            {{-- Language Content --}}
            @foreach($result['languages'] as $language)
                <div class="form-group">
                    <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ProductAttributeName') }} ({{ $language->name }})
                        <span style="color:red">★</span>
                    </label>
                    <div class="col-sm-10 col-md-8">
                        {!! Form::text("language_array[".$language->languages_id."][name]",
                            empty($result['product_attribute']->language_array[$language->languages_id]['name']) ? '' :
                            print_value($result['operation'],$result['product_attribute']->language_array[$language->languages_id]['name']),
                            array('class'=>'form-control field-validate
                            ', 'id'=>'name'))
                        !!}
                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                            {{ trans('labels.ProductOptionName') }} {{ $language->name }} </span>
                        <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                    </div>
                </div>
            @endforeach
            <div class="form-group">
                <label for="name"
                    class="col-sm-2 col-md-3 control-label">{{ trans('labels.Image') }}</label>
                <div class="col-sm-10 col-md-4">
                    {!! Form::file('image', array('id'=>'image')) !!}
                    <span class="help-block"
                        style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.ProductAttributeText') }}</span>
                    @if(!empty($result['product_attribute']->image))
                    <img width="150px" src="{{asset('').'/'.$result['product_attribute']->image}}"
                        class="img-circle">
                    @else
                        <img src="../../resources/assets/images/default_images/product.png"
                        style="width: 50px; float: left; margin-right: 10px">
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="name"
                    class="col-sm-2 col-md-3 control-label">{{ trans('labels.Qty') }}</label>
                <div class="col-sm-10 col-md-4">
                    {!! Form::text('qty', empty($result['product_attribute']->qty) ? '' : print_value($result['operation'],$result['product_attribute']->qty),
                    array('class'=>'form-control field-validate', 'id'=>'qty')) !!}
                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                    {{ trans('labels.ProductAttributePriceText') }}
                    </span>
                    <span class="help-block hidden">{{ trans('labels.ProductAttributePriceText') }}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Price') }}</label>
                <div class="col-sm-2 col-md-2">
                    <select class="form-control" name="price_prefix" id="price_prefix">
                        <option value="add"
                            @if(!empty($result['product_attribute']->price_prefix))
                                {{print_selected_value($result['operation'],"add",$result['product_attribute']->price_prefix)}}
                            @endif>
                            +
                        </option>
                        <option value="substract"
                            @if(!empty($result['product_attribute']->price_prefix))
                                {{print_selected_value($result['operation'],"substract",$result['product_attribute']->price_prefix)}}
                            @endif>
                            -
                        </option>
                    </select>
                </div>
                <div class="col-sm-10 col-md-4">
                    {!! Form::text('price', empty($result['product_attribute']->price) ? '' : print_value($result['operation'],$result['product_attribute']->price),
                    array('class'=>'form-control field-validate', 'id'=>'price')) !!}
                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                    {{ trans('labels.ProductAttributePriceText') }}
                    </span>
                    <span class="help-block hidden">{{ trans('labels.ProductAttributePriceText') }}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="name"
                    class="col-sm-2 col-md-3 control-label">{{ trans('labels.LowLimit') }}</label>
                <div class="col-sm-10 col-md-4">
                    {!! Form::text('low_limit', empty($result['product_attribute']->low_limit) ? '' : print_value($result['operation'],$result['product_attribute']->low_limit),
                    array('class'=>'form-control field-validate', 'id'=>'low_limit')) !!}
                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                    {{ trans('labels.QuantityLowLimitText') }}
                    </span>
                    <span class="help-block hidden">{{ trans('labels.QuantityLowLimitText') }}</span>
                </div>
            </div>
            @include('layouts/dialog_submit_back_button')
            {!! Form::close() !!}
        </div>
    </div>
</div>
