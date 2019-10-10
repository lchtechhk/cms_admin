@extends('admin.layout') @section('content')
<script src={{App::make('url')->to('/')."/resources/assets/js/order.js"}}></script>

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
                                    {{-- Content --}}
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h2 class="page-header">
                                                <i class="fa fa-globe"></i> {{ trans('labels.OrderID') }} 
                                                <small class="pull-right">
                                                    {{ trans('labels.OrderedDate') }}: {{ date('Y-m-d')}}
                                                    <a class="btn btn-primary part_date_purchased">
                                                        {{ trans('labels.Edit') }}
                                                    </a>
                                                </small>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="row invoice-info">
                                        <div class="col-sm-4 invoice-col">
                                            <div style="border:1px black solid;background:#3c8dbc;color:#FFF;text-align:center;">{{ trans('labels.CustomerInfo') }}</div><br>
                                            <address>
                                                <table>
                                                    <tr>
                                                        <td style="padding:10px;"><div style="font-weight:bold;">{{ trans('labels.CustomerName') }} : </div></td>
                                                        <td style="padding:10px;"><div id="add_customer_name" ></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:10px;"><div style="font-weight:bold;">{{ trans('labels.CompanyName') }} : </div></td>
                                                        <td style="padding:10px;"><div id="add_company_name" ></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:10px;"><div style="font-weight:bold;">{{ trans('labels.Address') }} : </div></td>
                                                        <td style="padding:10px;"><div id="add_customer_street_address" ></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:10px;"><div style="font-weight:bold;">{{ trans('labels.Phone') }} : </div></td>
                                                        <td style="padding:10px;"><div id="add_customer_telephone" ></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:10px;"><div style="font-weight:bold;">{{ trans('labels.Email') }} : </div></td>
                                                        <td style="padding:10px;"><div id="add_email" ></div></td>
                                                    </tr>
                                                </table>
                                    
                                            </address>
                                            <div class="row text-center" >
                                                <div class="col-xs-12">
                                                    <a class="btn btn-primary part_customer_address">
                                                        {{ trans('labels.Edit') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 invoice-col">
                                            <div style="border:1px black solid;background:#3c8dbc;color:#FFF;text-align:center;">{{ trans('labels.ShippingInfo') }}</div><br>
                                            <address>
                                                <strong> {{ trans('labels.ShippingMethod') }}:</strong> <div id="add_shipping_method" ></div><br>
                                                <strong> {{ trans('labels.ShippingCost') }}:</strong> <div id="add_shipping_cost" ></div>
                                            </address>
                                            <div class="row text-center" >
                                                <div class="col-xs-12">
                                                    <a class="btn btn-primary part_shipping_address">
                                                        {{ trans('labels.Edit') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <hr/>

                                    {{-- <div class="row">
                                        <div class="col-xs-12 table-responsive">
                                            <div class="table-wrap" style="fro">
                                                <div class="table">
                                                    <div class="pull-right">
                                                        <a  order_id='{{ $result['order']->order_id }}'
                                                            class="btn btn-warning part_add_product">
                                                            {{ trans('labels.Add') }}
                                                        </a>
                                                    </div>
                                                    <table id="view_order_table" class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>{{ trans('labels.Id') }}</th>
                                                                <th>{{ trans('labels.Image') }}</th>
                                                                <th>{{ trans('labels.ProductName') }}</th>
                                                                <th>{{ trans('labels.Qty') }}</th>
                                                                <th>{{ trans('labels.FinalPrice') }}</th>
                                                                <th>{{ trans('labels.Action') }}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if (!empty($result['order']->order_products) && sizeof($result['order']->order_products) > 0)
                                                                @foreach($result['order']->order_products as $order_product)
                                                                    <tr>
                                                                        <td>{{  $order_product->order_product_id }}</td>
                                                                        <td >
                                                                            @if(!empty($order_product->image))
                                                                                <img src="{{ asset('').$order_product->image }}" width="60px">
                                                                            @else
                                                                            <img src={{asset('')."resources/assets/images/default_images/product.png"}}
                                                                                style="width: 50px; float: left; margin-right: 10px">
                                                                            @endif
                                                                        </td>
                                                                        <td  width="30%">
                                                                            {{  $order_product->full_product_name }}<br>
                                                                        </td>
                                                                        <td>{{  $order_product->product_quantity }}</td>
                                                                        <td>{{ $order_product->currency_id}} {{ $order_product->final_price }}</td>
                                                                        <td>
                                                                            <a data-toggle="tooltip" data-placement="bottom" title="View Order Product" order_product='{{json_encode($order_product)}}' order_product_id='{{ $order_product->order_product_id }}'
                                                                                class="badge bg-light-blue part_edit_product"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                                            <a data-toggle="tooltip" data-placement="bottom" title="Delete Order Product" id="deleteOrderProductbtn" order_id='{{$order_product->order_id}}' order_product_id='{{ $order_product->order_product_id }}' class="badge bg-red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                <tr >
                                                                    <th>{{ trans('labels.Total') }}:</th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <th></th>
                                                                    <td style="background-color:gray;" width="30%">{{ $order_product->currency_id }} {{ $result['order']->order_price }}</td>
                                                                </tr>
                                                            @else
                                                                <tr >
                                                                    <td colspan="6" style="text-align:center;">No Any Product</td>
                                                                </tr>
                                                            @endif
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
                                    </div> --}}
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
        @include('admin/order/add/dialog_date_purchased')
        @include('admin/order/add/dialog_customer_address')
        @include('admin/order/add/dialog_shipping_address')
        @include('admin/order/add/dialog_add_product')
        @include('admin/order/deleteOrderProduct')
        <div class="modal fade" id="dialog_edit_product" tabindex="-1" role="dialog" aria-labelledby="dialog_edit_product">
               @include('admin/order/add/dialog_edit_product')
       </div>
       
    </section>
</div>
@endsection