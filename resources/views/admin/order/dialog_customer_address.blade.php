{{-- @include('generic/order_function') --}}
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="CustomerInfo">{{ trans('labels.CustomerInfo') }}</h4>
        </div>

        {!! Form::open(array('url' =>'admin/updateOrder', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
            <div class="box-body">
                <div class="form-group">
                    <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.PurchasedDate') }}<span style="color:red">★</span></label> 
                    <div class="col-sm-10 col-md-4">
                        {!! Form::text('date_purchased', 
                        empty($result['order']->date_purchased) ? '' : print_value($result['operation'],$result['order']->date_purchased),
                        array('class'=>'form-control datepicker','id'=>'date_purchased')) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.CustomerName') }}<span style="color:red">★</span></label> 
                    <div class="col-sm-10 col-md-4">
                        {!! Form::text('customer_name', 
                        empty($result['order']->customer_name) ? '' : print_value($result['operation'],$result['order']->customer_name),
                        array('class'=>'form-control datepicker','id'=>'customer_name')) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.CompanyName') }}<span style="color:red">★</span></label> 
                    <div class="col-sm-10 col-md-4">
                        {!! Form::text('customer_company', 
                        empty($result['order']->customer_company) ? '' : print_value($result['operation'],$result['order']->customer_company),
                        array('class'=>'form-control datepicker','id'=>'customer_company')) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Address') }}<span style="color:red">★</span></label> 
                    <div class="col-sm-10 col-md-4">
                        {!! Form::text('customer_street_address', 
                        empty($result['order']->customer_company) ? '' : print_value($result['operation'],$result['order']->customer_street_address),
                        array('class'=>'form-control datepicker','id'=>'customer_street_address')) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Phone') }}<span style="color:red">★</span></label> 
                    <div class="col-sm-10 col-md-4">
                        {!! Form::text('customer_telephone', 
                        empty($result['order']->customer_telephone) ? '' : print_value($result['operation'],$result['order']->customer_telephone),
                        array('class'=>'form-control datepicker','id'=>'customer_telephone')) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Email') }}<span style="color:red">★</span></label> 
                    <div class="col-sm-10 col-md-4">
                        {!! Form::text('email', 
                        empty($result['order']->email) ? '' : print_value($result['operation'],$result['order']->email),
                        array('class'=>'form-control datepicker','id'=>'email')) !!}
                    </div>
                </div>
            </div>
            @include('layouts/dialog_submit_back_button')
        {!! Form::close() !!}
    </div>
</div>