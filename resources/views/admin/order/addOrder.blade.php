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
                                    {!! Form::open(array('url' =>'admin/addOrder', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                                    {{-- Content --}}
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h2 class="page-header">
                                                <i class="fa fa-globe"></i> {{ trans('labels.OrderID') }} 
                                                <small class="pull-right">
                                                    <span style="font-weight:bold;">{{ trans('labels.OrderedDate') }} : </span><span id="display_date_purchasede" >{{ date('Y-m-d')}}</span>
                                                    <a class="btn btn-primary part_date_purchased">
                                                        {{ trans('labels.Edit') }}
                                                    </a>
                                                </small>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="row invoice-info">
                                        <div class="col-sm-6 invoice-col">
                                            <div style="border:1px black solid;background:#3c8dbc;color:#FFF;text-align:center;">{{ trans('labels.CustomerInfo') }}</div><br>
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
                                            <div class="row text-center" >
                                                <div class="col-xs-12">
                                                    <a class="btn btn-primary part_customer_address">
                                                        {{ trans('labels.Edit') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 invoice-col">
                                            <div style="border:1px black solid;background:#3c8dbc;color:#FFF;text-align:center;">{{ trans('labels.ShippingInfo') }}</div><br>
                                            <table>
                                                <tr>
                                                    <td style="padding:10px;"><div style="font-weight:bold;">{{ trans('labels.ShippingMethod') }} : </div></td>
                                                    <td style="padding:10px;"><div id="add_shipping_method" ></div></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:10px;"><div style="font-weight:bold;">{{ trans('labels.ShippingCost') }} : </div></td>
                                                    <td style="padding:10px;"><div id="add_shipping_cost" ></div></td>
                                                </tr>
                                            </table>
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

                                    <div class="row">
                                        <div class="col-xs-12 table-responsive">
                                            <div class="table-wrap" style="fro">
                                                <div style="border:1px black solid;background:#3c8dbc;color:#FFF;text-align:center;">{{ trans('labels.Product') }}</div><br>

                                                <div class="table">
                                                    <div class="pull-right">
                                                        <a class="btn btn-warning part_add_product">
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
                                                        <tbody id="row_order_table">
                                                            <tr id="no_any_product">
                                                                <td colspan="7" style="text-align:center;">No Any Product</td>
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
                                                <select class="form-control select2" id="order_status" name="order_status" style="width: 100%;">
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
                                    {{-- <div class="col-xs-12">
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
                                    <div class="box-footer text-center">
                                        <div id="add_{{$result['label']}}" type="submit" class="btn btn-primary">{{ trans('labels.'.$result['operation'].$result['label']) }}</div>
                                        <a href="{{ URL::to('admin/listing'.$result['label'])}}" type="button" class="btn btn-default">{{ trans('labels.back') }}</a>
                                    </div>
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