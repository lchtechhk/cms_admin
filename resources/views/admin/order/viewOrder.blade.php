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
                                    @if ($result['operation'] == 'listing' || $result['operation'] == 'add' || $result['operation'] == 'view_add' )
                                        {!! Form::open(array('url' =>'admin/addOrder', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                                    @elseif ($result['operation'] == 'edit' || $result['operation'] == 'view_edit')
                                        {!! Form::open(array('url' =>'admin/updateOrder', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                                    @endif

                                    {{-- Only Edit --}}
                                    @if ($result['operation'] == 'edit' || $result['operation'] == 'view_edit')

                                        <div class="form-group">
                                        
                                        </div>
                                    @endif

                                    {{-- Content --}}
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h2 class="page-header">
                                                <i class="fa fa-globe"></i> {{ trans('labels.OrderID') }}# {{ $result['order']->order_id }}
                                                {!! Form::hidden('order_id', empty($result['order']->order_id) ? '' :
                                                print_value($result['operation'],$result['order']->order_id),
                                                array('class'=>'form-control', 'id'=>'order_id','readonly')) !!}
                                                <small class="pull-right">{{ trans('labels.OrderedDate') }}: {{ date('Y-m-d', strtotime($result['order']->date_purchased)) }}</small>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="row invoice-info">
                                        <div class="col-sm-4 invoice-col">
                                            {{ trans('labels.CustomerInfo') }}:
                                            <address>
                                                {{ trans('labels.CustomerName') }}:<strong>{{ $result['order']->customer_name }}</strong><br>
                                                {{ trans('labels.Address') }}: {{ $result['order']->customer_street_address }} <br>
                                                {{ trans('labels.Phone') }}: {{ $result['order']->customer_telephone }}<br>
                                                {{ trans('labels.Email') }}: {{ $result['order']->email }}
                                            </address>
                                        </div>
                                        <div class="col-sm-4 invoice-col">
                                            {{ trans('labels.ShippingInfo') }}
                                            <address>
                                                {{ trans('labels.CustomerName') }}: <strong>{{ $result['order']->delivery_name }}</strong><br>
                                                {{ trans('labels.Address') }}: {{ $result['order']->delivery_street_address }} <br>
                                                <strong> {{ trans('labels.ShippingMethod') }}:</strong> {{ $result['order']->shipping_method }} <br>
                                                <strong> {{ trans('labels.ShippingCost') }}:</strong> {{(!empty($result['order']->shipping_cost)) }}<br>
                                            </address>
                                        </div>
                                    </div>
                                    <div class="row text-center" >
                                        <div class="col-xs-12">
                                            <a  order_id='{{ $result['order']->order_id }}'
                                                class="btn btn-primary view_order_address_part">
                                                {{ trans('labels.Edit') }}
                                            </a>
                                        </div>
                                    </div>
                                    <hr/>

                                    <div class="row">
                                        <div class="col-xs-12 table-responsive">
                                            <div class="table-wrap" style="fro">
                                                <div class="table">
                                                    <table id="view_order_table" class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>{{ trans('labels.Id') }}</th>
                                                                <th>{{ trans('labels.Image') }}</th>
                                                                <th>{{ trans('labels.ProductName') }}</th>
                                                                <th>{{ trans('labels.Qty') }}</th>
                                                                <th>{{ trans('labels.Price') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($result['order']->order_products as $order_product)
                                                                <tr>
                                                                    <td>{{  $order_product->order_product_id }}</td>
                                                                    <td >
                                                                        @if(!empty($order_product->image))
                                                                            <img src="{{ asset('').$order_product->image }}" width="60px">
                                                                        @else
                                                                        <img src="../resources/assets/images/default_images/product.png"
                                                                            style="width: 50px; float: left; margin-right: 10px">
                                                                        @endif
                                                                    </td>
                                                                    <td  width="30%">
                                                                        {{  $order_product->product_name }}<br>
                                                                    </td>
                                                                    <td>{{  $order_product->product_quantity }}</td>
                                                                    <td>{{ $order_product->currency_id}} {{ $order_product->final_price }}</td>
                                                                </tr>
                                                            @endforeach
                                                            <tr >
                                                                <th>{{ trans('labels.Total') }}:</th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <td style="background-color:gray;" width="30%">{{ $order_product->currency_id }}{{ $result['order']->order_price }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>                                            
                                            </div>
                                        </div>                                            
                                    </div>

                                    <div class="col-xs-12">
                                        <hr>
                                        <p class="lead">{{ trans('labels.ChangeStatus') }}:</p>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ trans('labels.PaymentStatus') }}:</label>
                                                <select class="form-control select2" name="order_status" style="width: 100%;">
                                                        <option value="pending" 
                                                            @if(!empty($result['order']->order_status))
                                                                {{print_selected_value($result['operation'],'pending',$result['order']->order_status)}}
                                                            @endif>
                                                            Pending
                                                        </option>
                                                        <option value="complete" 
                                                            @if(!empty($result['order']->order_status))
                                                                {{print_selected_value($result['operation'],'complete',$result['order']->order_status)}}
                                                            @endif>
                                                            Complete
                                                        </option>
                                                        <option value="cancel" 
                                                            @if(!empty($result['order']->order_status))
                                                                {{print_selected_value($result['operation'],'cancels',$result['order']->order_status)}}
                                                            @endif>
                                                            Cancel
                                                        </option>
                                                </select>
                                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.ChooseStatus') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <hr>
                                        <p class="lead">{{ trans('labels.Comment') }}:</p>
                                        <div class="row">
                                            <div class="col-xs-12 table-responsive">
                                                <div class="table-wrap" style="fro">
                                                    <div class="table">
                                                        <table id="view_order_comment" class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>{{ trans('labels.Id') }}</th>
                                                                    <th>{{ trans('labels.OperationBy') }}</th>
                                                                    <th>{{ trans('labels.Comment') }}</th>
                                                                    <th>{{ trans('labels.CreateDate') }}</th>
                                                                </tr>
                                                                @if (!empty($result['order']->order_comments) && sizeof($result['order']->order_comments) > 0)
                                                                    @foreach($result['order']->order_comments as $order_comment)
                                                                        <tr>
                                                                            <td>{{  $order_comment->order_comment_id }}</td>    
                                                                            <td>{{  $order_comment->permission }}</td>    
                                                                            <td>{{  $order_comment->comment }}</td>    
                                                                            <td>{{  $order_comment->create_date }}</td>    
                                                                        </tr>
                                                                    @endforeach
                                                                @else
                                                                    <tr>
                                                                        <td colspan="4" style="text-align:center;">Nothing Comment</td>    
                                                                    </tr>  
                                                                @endif
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
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
         <!-- View Address Part Dialog -->
         <div class="modal fade" id="order_address_part" tabindex="-1" role="dialog" aria-labelledby="addressLabel">
            @include('admin/order/view_order_address_part')
        </div>
    </section>
</div>
@endsection