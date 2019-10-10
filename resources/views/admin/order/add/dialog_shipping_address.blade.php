{{-- @include('generic/order_function') --}}
<div class="modal fade" id="dialog_shipping_address" tabindex="-1" role="dialog" aria-labelledby="dialog_shipping_address">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ShippingInfo">{{ trans('labels.ShippingInfo') }}</h4>
            </div>

            {!! Form::open(array('id'=>'form_shipping_address' ,'method'=>'post', 'class' => 'form-horizontal')) !!}
                <div class="box-body">           
                    <div class="form-group" id="group_shipping_method">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ShippingMethod') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('shipping_method', 
                            empty($result['order']->shipping_method) ? '' : print_value($result['operation'],$result['order']->shipping_method),
                            array('class'=>'form-control field-validate','id'=>'shipping_method')) !!}
                        </div>
                    </div>
                    <div class="form-group" id="group_shipping_cost">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ShippingCost') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('shipping_cost', 
                            empty($result['order']->shipping_cost) ? '' : print_value($result['operation'],$result['order']->shipping_cost),
                            array('class'=>'form-control field-validate','id'=>'shipping_cost', "onkeypress"=>'validate(event)')) !!}
                        </div>
                    </div>
                
                </div>
                <div class="modal-footer">
                    <div class="btn btn-primary" id="addShipping">{{ trans('labels.Add') }}</div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>