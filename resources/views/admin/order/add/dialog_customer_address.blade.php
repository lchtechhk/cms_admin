{{-- @include('generic/order_function') --}}
<div class="modal fade" id="dialog_customer_address" tabindex="-1" role="dialog" aria-labelledby="dialog_customer_address">
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
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.CompanyName') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('customer_company', 
                            empty($result['order']->customer_company) ? '' : print_value($result['operation'],$result['order']->customer_company),
                            array('class'=>'form-control','id'=>'customer_company')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Address') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('customer_street_address', 
                            empty($result['order']->customer_company) ? '' : print_value($result['operation'],$result['order']->customer_street_address),
                            array('class'=>'form-control','id'=>'customer_street_address')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Phone') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('customer_telephone', 
                            empty($result['order']->customer_telephone) ? '' : print_value($result['operation'],$result['order']->customer_telephone),
                            array('class'=>'form-control','id'=>'customer_telephone')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Email') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('email', 
                            empty($result['order']->email) ? '' : print_value($result['operation'],$result['order']->email),
                            array('class'=>'form-control','id'=>'email')) !!}
                        </div>
                    </div>
                </div>
                @include('layouts/dialog_submit_back_button')
            {!! Form::close() !!}
        </div>
    </div>
</div>