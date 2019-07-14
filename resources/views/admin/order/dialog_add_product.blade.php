{{-- @include('generic/order_function') --}}
<div class="modal fade" id="dialog_add_product" tabindex="-1" role="dialog" aria-labelledby="dialog_add_product">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ProductInfo">{{ trans('labels.ProductInfo') }}</h4>
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
                   
                </div>
                @include('layouts/dialog_submit_back_button')
            {!! Form::close() !!}
        </div>
    </div>
</div>