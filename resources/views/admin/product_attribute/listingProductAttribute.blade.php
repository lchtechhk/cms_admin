@extends('admin.layout')
@section('content')
<div class="content-wrapper">
    @include('layouts/list_header')
    <section class="content">
        @include('layouts/responseMessage')
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">{{ trans('labels.ListingAllProductAttribute') }} </h3>
                        <div class="box-tools pull-right">
                                <button type="button" class="btn btn-block btn-primary addProductAttributeModal" 
                                product_id='{{$result['product_id']}}'
                                data-toggle="modal">{{ trans('labels.ListingProductAttribute') }}</button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table-wrap" style="fro">
                                    <div class="table">
                                        <table id="ProductAttribute" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>{{ trans('labels.ID') }}</th>
                                                    <th>{{ trans('labels.Name') }}</th>
                                                    <th>{{ trans('labels.Image') }}</th>
                                                    <th>{{ trans('labels.Qty') }}</th>
                                                    <th>{{ trans('labels.price_prefix') }}</th>
                                                    <th>{{ trans('labels.price') }}</th>
                                                    <th>{{ trans('labels.Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($result['product_attributes'])>0)
                                                @foreach ($result['product_attributes'] as $product_attribute)
                                                <tr>
                                                    <td>{{ $product_attribute->product_attribute_id }}</td>
                                                    <td>{{ $product_attribute->product_attribute_name }}</td>
                                                    <td>
                                                        @if(!empty($product_attribute->image))
                                                        <img src="../../{{ $product_attribute->image }}"
                                                            style="width: 50px; float: left; margin-right: 10px">
                                                        @else
                                                        <img src={{asset('')."resources/assets/images/default_images/product.png"}}
                                                            style="width: 50px; float: left; margin-right: 10px">
                                                        @endif
                                                    </td>
                                                    <td>{{ $product_attribute->qty }}</td>
                                                    <td>{{ $product_attribute->price_prefix }}</td>
                                                    <td>{{ $product_attribute->price }}</td>
                                                    <td>
                                                        <a product_id='{{ $product_attribute->product_id }}'
                                                            product_attribute_id="{{ $product_attribute->product_attribute_id }}"
                                                            class="badge bg-light-blue editProductAttributeModal">
                                                            <i class="fa fa-pencil-square-o"aria-hidden="true"></i>
                                                        </a>
                                                        <a product_id='{{ $product_attribute->product_id }}'
                                                            product_attribute_id="{{$product_attribute->product_attribute_id}}"
                                                            class="badge bg-red deleteProductAttributeBtn">
                                                            <i class="fa fa-trash " aria-hidden="true"></i>
                                                        </a>

                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <td colspan="5">{{ trans('labels.NoRecordFound') }}</td>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-xs-12 text-right">
                                    {{-- {{$result->links('vendor.pagination.default')}} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- ProductImageDialog -->
         <div class="modal fade" id="productAttributeDialog" tabindex="-1" role="dialog" aria-labelledby="addressLabel">
            {{-- @include('admin/product_attribute/productAttributeDialog') --}}
            <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="productAuttributeLabel">{{ trans('labels.AddressPart') }}</h4>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.PurchasedDate') }}<span style="color:red">★</span></label> 
                                    <div class="col-sm-10 col-md-4">
                                        {!! Form::text('date_purchased', 
                                        empty($result['order']->date_purchased) ? '' : testing(),
                                        array('class'=>'form-control datepicker','id'=>'date_purchased')) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- delete -->
        @include('admin/product_attribute/deleteProductAttribute')
    </section>
</div>
@endsection