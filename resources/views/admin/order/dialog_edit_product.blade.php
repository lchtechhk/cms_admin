@include('generic/order_function')
{{-- <div class="modal fade" id="dialog_edit_product" tabindex="-1" role="dialog" aria-labelledby="dialog_edit_product"> --}}
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ProductInfo">{{ trans('labels.ProductInfo') }}</h4>
            </div>
            {!! Form::open(array('url' =>'admin/updateOrderProduct', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
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
                            array('class'=>'form-control','readonly')) !!}
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
                            array('class'=>'form-control','readonly')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Price') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('product_price', 
                            empty($result['order_product']->product_price) ? '' : order_print_value($result['operation'],$result['order_product']->product_price),
                            array('class'=>'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Qty') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('product_quantity', 
                            empty($result['order_product']->product_quantity) ? '' : order_print_value($result['operation'],$result['order_product']->product_quantity),
                            array('class'=>'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.FinalPrice') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('final_price', 
                            empty($result['order_product']->final_price) ? '' : order_print_value($result['operation'],$result['order_product']->final_price),
                            array('class'=>'form-control')) !!}
                        </div>
                    </div>
                   
                </div>
                @include('layouts/dialog_submit_back_button')
            {!! Form::close() !!}
        </div>
    </div>
{{-- </div> --}}