{{-- @include('generic/order_function') --}}
<script>
    function initial(){
        $('#add_product_price').val(0);
        $('#add_product_quantity').val(0);
        $('#add_final_price').val(0);
    }
    $( document ).ready(function() {
        initial();
        $("#add_product_quantity" ).on('input',function(e){
        var price = $('#add_product_price').val();
        var qty = $(this).val();
        if(price != '' && qty != ''){
            var total_amount = price*qty;
            $('#add_final_price').val(total_amount);
            $("#add_final_price").attr("readonly", false); 
            // console.log("total_amount : " + total_amount);
        }
        });
    });
    function order_change_product(asset,a){
        if(a != undefined){
            initial();
            $("#add_product_quantity").attr("readonly", false); 
            var json = JSON.parse(a)
            var product_attribute_name = json["product_attribute_name"];
            var image = json["image"];
            var price = json["price"];
            // console.log(asset)
            // console.log(image)
            // console.log(price)
            $('#add_product_name').val(product_attribute_name);
            $('#add_order_product_image').attr('src', asset+image)
            $('#add_product_price').val(price);
        }
    }
</script>
<div class="modal fade" id="dialog_add_product" tabindex="-1" role="dialog" aria-labelledby="dialog_add_product">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ProductInfo">{{ trans('labels.ProductInfo') }}</h4>
            </div>
    
            {!! Form::open(array('url' =>'admin/addOrderProduct', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                <div class="box-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.OrderId') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('order_id', 
                            empty($result['order']->order_id) ? '' : print_value($result['operation'],$result['order']->order_id),
                            array('class'=>'form-control','readonly','required')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Product') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-9">
                            <select class="form-control select2 " required name="product_attribute_id" id="product_attribute_id" style="width: 100%;" onchange="order_change_product('{{asset('')}}',this.options[this.selectedIndex].getAttribute('data'))">
                                <option value="">-</option>
                                @foreach ($result['product_attributes'] as $product_attribute)
                                    <option data="{{json_encode($product_attribute)}}" value="{{ $product_attribute->product_attribute_id }}">
                                        {{ $product_attribute->product_name }} | {{$product_attribute->product_attribute_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Image') }}<span style="color:red"></span></label> 
                        <div class="col-sm-10 col-md-4">
                            @if(!empty($result['order_product']->image))
                                <img id="add_order_product_image" src="" width="60px">
                            @else
                            <img id="add_order_product_image" src={{asset('')."resources/assets/images/default_images/product.png"}}
                                style="width: 50px; float: left; margin-right: 10px">
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="label_product_name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ProductName') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('product_name', '',
                            array('class'=>'form-control ','readonly','id'=>'add_product_name','required')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Price') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('product_price','',
                            array('class'=>'form-control ','readonly','id'=>'add_product_price','value'=>"","onkeypress"=>'validate(event)','required')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Qty') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('product_quantity','',
                            array('class'=>'form-control ','id'=>'add_product_quantity','readonly',"onkeypress"=>'validate(event)','required')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.FinalPrice') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('final_price','',
                            array('class'=>'form-control ','id'=>'add_final_price','readonly',"onkeypress"=>'validate(event)','required')) !!}
                        </div>
                    </div>
                </div>
                @include('layouts/dialog_add_back_button')
            {!! Form::close() !!}
        </div>
    </div>
</div>
