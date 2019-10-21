@extends('admin.layout') @section('content')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
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
                                                <small class="pull-right">
                                                    {{ trans('labels.OrderedDate') }}: {{ date('Y-m-d', strtotime($result['order']->date_purchased)) }}
                                                    <a  order_id='{{ $result['order']->order_id }}'
                                                        class="btn btn-primary part_date_purchased">
                                                        {{ trans('labels.Edit') }}
                                                    </a>
                                                </small>
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
                                            <div class="row text-center" >
                                                <div class="col-xs-12">
                                                    <a  order_id='{{ $result['order']->order_id }}'
                                                        class="btn btn-primary part_customer_address">
                                                        {{ trans('labels.Edit') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 invoice-col">
                                            {{ trans('labels.ShippingInfo') }}
                                            <address>
                                                <strong> {{ trans('labels.ShippingMethod') }}:</strong> {{ $result['order']->shipping_method }} <br>
                                                <strong> {{ trans('labels.ShippingCost') }}:</strong> {{$result['order']->shipping_cost}}<br>
                                            </address>
                                            <div class="row text-center" >
                                                <div class="col-xs-12">
                                                    <a  order_id='{{ $result['order']->order_id }}'
                                                        class="btn btn-primary part_shipping_address">
                                                        {{ trans('labels.Edit') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <hr/>

                                    <div class="row">
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
                                                                <th>{{ trans('labels.UnitPrice') }}</th>
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
                                                                        <td>{{  $order_product->product_price }}</td>
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
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>{{ trans('labels.OrderStatus') }}:</label>
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
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12">
                                        <hr>
                                            <div class="col-xs-6">
                                                <p class="lead">{{ trans('labels.CustomerComment') }}:</p>
                                                <table id="view_order_comment" class="table table-striped">
                                                    <tr>
                                                        <th>{{ trans('labels.id') }}</th>
                                                        <th>{{ trans('labels.CreateDate') }}</th>
                                                        <th>{{ trans('labels.Comment') }}</th>
                                                    </tr>
                                                    @if (!empty($result['order']->order_comments) && sizeof($result['order']->order_comments) > 0) 
                                                        @foreach ($result['order']->order_comments as $item)
                                                            <tr>
                                                                <td>{{$item->order_comment_id}}</td>
                                                                <td>{{$item->comment_date}}</td>
                                                                <td>{{$item->comment}}</td>
                                                            </tr>
                                                        @endforeach    
                                                     @else
                                                        <tr>
                                                            <td colspan="3" style="text-align:center;">Nothing Comment</td> 
                                                        </tr>
                                                    @endif
                                                    
                                                </table>
                                            </div>

                                            <div class="col-xs-6">
                                                <p class="lead">{{ trans('labels.remark') }}:</p>
                                                <div class="form-group">
                                                    <textarea id="order_remark" name="order_remark" class="form-control" rows="3"></textarea>
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
         @include('admin/order/edit/dialog_date_purchased')
         @include('admin/order/edit/dialog_customer_address')
         @include('admin/order/edit/dialog_shipping_address')
         @include('admin/order/edit/dialog_add_product')
         @include('admin/order/deleteOrderProduct')
         <div class="modal fade" id="dialog_edit_product" tabindex="-1" role="dialog" aria-labelledby="dialog_edit_product">
                @include('admin/order/edit/dialog_edit_product')
        </div>
    </section>
</div>
<script type="text/javascript">
    window.onload = function()
    {
        CKEDITOR.replace( 'order_remark', {
            filebrowserBrowseUrl: '{{url('uploads/images/')}}',
            filebrowserUploadUrl: '{{url('admin/article/image')}}?_token={{csrf_token()}}'
        });
    };
</script>
@endsection