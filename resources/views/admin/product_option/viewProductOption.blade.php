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
                                    {!! Form::open(array('url' =>'admin/addProductOption', 'method'=>'post',
                                    'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                                    @elseif ($result['operation'] == 'edit' || $result['operation'] == 'view_edit')
                                    {!! Form::open(array('url' =>'admin/updateProductOption', 'method'=>'post',
                                    'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                                    @endif

                                    {{-- Only Edit --}}
                                    @if ($result['operation'] == 'edit' || $result['operation'] == 'view_edit')

                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ID') }}
                                            <span style="color:red">★</span>
                                        </label>
                                        <div class="col-sm-10 col-md-4">
                                            {!! Form::text('product_option_id', empty($result['product_option']->product_option_id) ? '' :
                                            print_value($result['operation'],$result['product_option']->product_option_id),
                                            array('class'=>'form-control', 'id'=>'product_option_id','readonly')) !!}
                                        </div>
                                    </div>

                                    @endif

                                    {{-- Content --}}

                                    {{-- Language Content --}}
                                    @foreach($result['languages'] as $language)
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Name') }} ({{ $language->name }})
                                                <span style="color:red">★</span>
                                            </label>
                                            <div class="col-sm-10 col-md-8">
                                                {!! Form::text("language_array[".$language->languages_id."][product_option_name]",
                                                    empty($result['product_option']->language_array[$language->languages_id]['product_option_name']) ? '' :
                                                    print_value($result['operation'],$result['product_option']->language_array[$language->languages_id]['product_option_name']),
                                                    array('class'=>'form-control field-validate
                                                    ', 'id'=>'name'))
                                                !!}
                                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                                                    {{ trans('labels.ProductOptionName') }} {{ $language->name }} </span>
                                                <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
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