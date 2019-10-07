{{-- @include('generic/order_function') --}}
<div class="modal fade" id="dialog_shipping_address" tabindex="-1" role="dialog" aria-labelledby="dialog_shipping_address">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ShippingInfo">{{ trans('labels.ShippingInfo') }}</h4>
            </div>

            {!! Form::open(array('url' =>'admin/updateOrder', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                <div class="box-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.OrderId') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('order_id', 
                            empty($result['order']->order_id) ? '' : print_value($result['operation'],$result['order']->order_id),
                            array('class'=>'form-control','readonly')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.CustomerName') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-9">
                            <select class="form-control select2 " required name="customer_id" id="customer_id" style="width: 100%;" {{is_disabled($result['operation'],empty($result['order']->customer_id) ? '' : $result['order']->customer_id)}}>
                                <option value="">-</option>
                                @foreach ($result['customers'] as $customer)
                                    <option value="{{ $customer->id }}"
                                        @if(!empty($result['order']->customer_id))
                                            {{print_selected_value($result['operation'],$customer->id,$result['order']->customer_id)}}
                                        @endif >
                                        {{ $customer->customers_lastname }} {{$customer->customers_firstname}}
                                    </option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.CustomerAddress') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-9">
                            <select class="form-control select2 " required name="customer_address_id" id="customer_address_id" style="width: 100%;" {{is_disabled($result['operation'],empty($result['order']->customer_id) ? '' : $result['order']->customer_id)}}>
                                <option value="">-</option>
                                @foreach ($result['customers'] as $customer)
                                    <option value="{{ $customer->id }}"
                                        @if(!empty($result['order']->customer_id))
                                            {{print_selected_value($result['operation'],$customer->id,$result['order']->customer_id)}}
                                        @endif >
                                        {{ $customer->customers_lastname }} {{$customer->customers_firstname}}
                                    </option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.DeliveryName') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('delivery_name', 
                            empty($result['order']->delivery_name) ? '' : print_value($result['operation'],$result['order']->delivery_name),
                            array('class'=>'form-control','id'=>'delivery_name')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Address') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('delivery_street_address', 
                            empty($result['order']->delivery_street_address) ? '' : print_value($result['operation'],$result['order']->delivery_street_address),
                            array('class'=>'form-control','id'=>'delivery_street_address')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ShippingMethod') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('shipping_method', 
                            empty($result['order']->shipping_method) ? '' : print_value($result['operation'],$result['order']->shipping_method),
                            array('class'=>'form-control','id'=>'shipping_method')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ShippingCost') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('shipping_cost', 
                            empty($result['order']->shipping_cost) ? '' : print_value($result['operation'],$result['order']->shipping_cost),
                            array('class'=>'form-control','id'=>'shipping_cost')) !!}
                        </div>
                    </div>
                
                </div>
                @include('layouts/dialog_submit_back_button')
            {!! Form::close() !!}
        </div>
    </div>
</div>