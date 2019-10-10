{{-- @include('generic/order_function') --}}
<div class="modal fade" id="dialog_customer_address" tabindex="-1" role="dialog" aria-labelledby="dialog_customer_address">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button id="close_dialog_customer_address" type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="CustomerInfo">{{ trans('labels.CustomerInfo') }}</h4>
            </div>

            {!! Form::open(array('id'=>'form_customer_address' ,'method'=>'post', 'class' => 'form-horizontal')) !!}
                <div class="box-body">        
                    <div class="form-group" id="group_customer_id">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.CustomerName') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-9">
                            <select class="form-control select1 field-validate"  name="customer_id" id="customer_id" style="width: 100%;" {{is_disabled($result['operation'],empty($result['order']->customer_id) ? '' : $result['order']->customer_id)}}>
                                <option phone="" email="" value="">-</option>
                                @foreach ($result['customers'] as $customer)
                                    <option phone="<?= $customer->customers_telephone?>" email="<?= $customer->email?>" value="{{ $customer->id }}"
                                        @if(!empty($result['order']->customer_id))
                                            {{print_selected_value($result['operation'],$customer->id,$result['order']->customer_id)}}
                                        @endif >{{ $customer->customers_lastname }} {{$customer->customers_firstname}}
                                    </option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group" id="group_customer_address_id">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.CustomerAddress') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-9">
                            <select class="form-control select1 field-validate" disabled  name="customer_address_id" id="customer_address_id" style="width: 100%;" {{is_disabled($result['operation'],empty($result['order']->customer_id) ? '' : $result['order']->customer_id)}}>
                                <option value="">-</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group" id="group_customer_company">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.CompanyName') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('customer_company', 
                            empty($result['order']->customer_company) ? '' : print_value($result['operation'],$result['order']->customer_company),
                            array('class'=>'form-control field-validate','id'=>'customer_company','disabled','')) !!}
                        </div>
                    </div>

                    <div class="form-group" id="group_customer_country">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Country') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('customer_country','',
                            array('class'=>'form-control field-validate','id'=>'customer_country','disabled','')) !!}
                        </div>
                    </div>

                    <div class="form-group" id="group_customer_city">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.City') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('customer_city','',
                            array('class'=>'form-control field-validate','id'=>'customer_city','disabled','')) !!}
                        </div>
                    </div>

                    <div class="form-group" id="group_customer_area">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Area') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('customer_area','',
                            array('class'=>'form-control field-validate','id'=>'customer_area','disabled','')) !!}
                        </div>
                    </div>

                    <div class="form-group" id="group_customer_district">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.District') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('customer_district','',
                            array('class'=>'form-control field-validate','id'=>'customer_district','disabled','')) !!}
                        </div>
                    </div>

                    <div class="form-group" id="group_customer_estate">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Estate') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('customer_estate','',
                            array('class'=>'form-control field-validate','id'=>'customer_estate','disabled','')) !!}
                        </div>
                    </div>

                    <div class="form-group" id="group_customer_building">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Building') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('customer_building','',
                            array('class'=>'form-control field-validate','id'=>'customer_building','disabled','')) !!}
                        </div>
                    </div>

                    <div class="form-group" id="group_customer_room">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Room') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('customer_room','',
                            array('class'=>'form-control field-validate','id'=>'customer_room','disabled','')) !!}
                        </div>
                    </div>

                    <div class="form-group" id="group_customer_street_address">
                        <label for="name" class="col-sm-2 col-md-3  control-label">{{ trans('labels.Address') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-9">
                            {!! Form::text('customer_street_address', 
                            empty($result['order']->customer_company) ? '' : print_value($result['operation'],$result['order']->customer_street_address),
                            array('class'=>'form-control field-validate','id'=>'customer_street_address','disabled','')) !!}
                        </div>
                    </div>

                    <div class="form-group" id="group_customer_telephone">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Phone') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('customer_telephone', 
                            empty($result['order']->customer_telephone) ? '' : print_value($result['operation'],$result['order']->customer_telephone),
                            array('class'=>'form-control field-validate','id'=>'customer_telephone','disabled',"onkeypress"=>'validate(event)')) !!}
                        </div>
                    </div>

                    <div class="form-group" id="group_email">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Email') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('email', 
                            empty($result['order']->email) ? '' : print_value($result['operation'],$result['order']->email),
                            array('class'=>'form-control field-validate','id'=>'email','disabled','')) !!}
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <div class="btn btn-primary" id="addCustomer">{{ trans('labels.Add') }}</div>
                </div>
                {{-- @include('layouts/submit_back_button') --}}
            {!! Form::close() !!}
        </div>
    </div>
</div>