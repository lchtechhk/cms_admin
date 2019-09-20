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
                                    {!! Form::open(array('url' =>'admin/addOrder', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                                    {{-- Content --}}
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.OrderId') }}<span style="color:red">★</span></label> 
                                            <div class="col-sm-10 col-md-4">
                                                {!! Form::text('order_id', 
                                                empty($result['order_product']->order_id) ? '' : order_print_value($result['operation'],$result['order_product']->order_id),
                                                array('class'=>'form-control','readonly')) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ProductId') }}<span style="color:red">★</span></label> 
                                            <div class="col-sm-10 col-md-4">
                                                {!! Form::text('order_product_id', 
                                                empty($result['order_product']->order_product_id) ? '' : order_print_value($result['operation'],$result['order_product']->order_product_id),
                                                array('class'=>'form-control ','readonly')) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Image') }}<span style="color:red">★</span></label> 
                                            <div class="col-sm-10 col-md-4">
                                                @if(!empty($result['order_product']->image))
                                                    <img src="{{ asset('').$result['order_product']->image}}" width="60px">
                                                @else
                                                <img src={{asset('')."resources/assets/images/default_images/product.png"}}
                                                    style="width: 50px; float: left; margin-right: 10px">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ProductName') }}<span style="color:red">★</span></label> 
                                            <div class="col-sm-10 col-md-4">
                                                {!! Form::text('', 
                                                empty($result['order_product']->product_name) ? '' : order_print_value($result['operation'],$result['order_product']->product_name),
                                                array('class'=>'form-control ','readonly')) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Price') }}<span style="color:red">★</span></label> 
                                            <div class="col-sm-10 col-md-4">
                                                {!! Form::text('product_price', 
                                                empty($result['order_product']->product_price) ? '' : order_print_value($result['operation'],$result['order_product']->product_price),
                                                array('class'=>'form-control','id'=>'edit_product_price','readonly')) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Qty') }}<span style="color:red">★</span></label> 
                                            <div class="col-sm-10 col-md-4">
                                                {!! Form::text('product_quantity', 
                                                empty($result['order_product']->product_quantity) ? '' : order_print_value($result['operation'],$result['order_product']->product_quantity),
                                                array('class'=>'form-control ','id'=>'edit_product_quantity')) !!}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.FinalPrice') }}<span style="color:red">★</span></label> 
                                            <div class="col-sm-10 col-md-4">
                                                {!! Form::text('final_price', 
                                                empty($result['order_product']->final_price) ? '' : order_print_value($result['operation'],$result['order_product']->final_price),
                                                array('class'=>'form-control ','id'=>'edit_final_price')) !!}
                                            </div>
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
    </section>
</div>
@endsection