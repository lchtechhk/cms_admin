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
                        <h3 class="box-title">{{ trans('labels.ListingAllMainCategories') }} </h3>
                        <div class="box-tools pull-right">
                            <a href="{{ URL::to('admin/view_addProduct') }}" type="button"
                                class="btn btn-block btn-primary">{{ trans('labels.AddNewProduct') }}</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table-wrap" style="fro">
                                    <div class="table">
                                        <table id="product" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>{{ trans('labels.ID') }}</th>
                                                    <th>{{ trans('labels.Image') }}</th>
                                                    <th>{{ trans('labels.Category') }}</th>
                                                    <th>{{ trans('labels.Name') }}</th>
                                                    <th>{{ trans('labels.Quantity') }}</th>
                                                    <th>{{ trans('labels.Weight') }}</th>
                                                    <th>{{ trans('labels.Price') }}</th>
                                                    <th>{{ trans('labels.CreateDate') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($result['products'])>0)
                                                @foreach ($result['products'] as $product)
                                                <tr>
                                                    <td>{{ $product->product_id }}</td>
                                                    <td>
                                                        @if(!empty($product->image))
                                                        <img src="../{{ $product->image }}"
                                                            style="width: 50px; float: left; margin-right: 10px">
                                                        @else
                                                        <img src="../resources/assets/images/default_images/product.png"
                                                            style="width: 50px; float: left; margin-right: 10px">
                                                        @endif
                                                    </td>
                                                    <td>{{ $product->category_name }}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->quantity }}</td>
                                                    <td>{{ $product->weight }}({{ $product->weight_unit }})</td>
                                                    <td>{{ $product->price }}</td>
                                                    <td>{{ $product->create_date }}</td>
                                                    <td>
                                                        <ul class="nav table-nav">
                                                            <li class="dropdown">
                                                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                                {{ trans('labels.Action') }} <span class="caret"></span>
                                                                </a>
                                                                <ul class="dropdown-menu">
                                                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="view_editProduct/{{ $product->product_id }}">{{ trans('labels.Edit') }}</a></li>
                                                                    <li role="presentation" class="divider"></li>
                                                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="listingProductImage/{{ $product->product_id }}">{{ trans('labels.ProductImages') }}</a></li>
                                                                    <li role="presentation" class="divider"></li>
                                                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="listingProductAttribute/{{ $product->product_id }}">{{ trans('labels.ProductAttribute') }}</a></li>
                                                                    <li role="presentation" class="divider"></li>
                                                                    <li role="presentation"><a role="menuitem" tabindex="-1" id="deleteProductId" products_id="{{ $product->product_id }}">{{ trans('labels.Delete') }}</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
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
        <!-- delete -->
        @include('admin/product/deleteProduct')
    </section>
</div>
@endsection