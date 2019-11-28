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
                        <h3 class="box-title">{{ trans('labels.ListingProductImage') }}</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-block btn-primary addProductImageModal" 
                                product_id='{{$result['product_id']}}'
                                data-toggle="modal">{{ trans('labels.ListingProductImage') }}</button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table-wrap" style="fro">
                                    <div class="table">
                                        <table id="product_image" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>{{ trans('labels.ID') }}</th>
                                                    <th>{{ trans('labels.Image') }}</th>
                                                    <th>{{ trans('labels.Description') }}</th>
                                                    <th>{{ trans('labels.Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody class="contentImages">
                                                @if (count($result['product_images']) > 0)
                                                @foreach($result['product_images'] as $product_image)
                                                    <tr>
                                                        <td>{{ $product_image->product_image_id }}</td>
                                                        <td>
                                                            @if(!empty($product_image->image))
                                                                <img src="{{asset('').'/'.$product_image->image}}" alt="" width=" 100px">
                                                            @else
                                                                <img src={{asset('')."resources/assets/images/default_images/product.png"}}
                                                                style="width: 50px; float: left; margin-right: 10px">
                                                            @endif
                                                        </td>
                                                        <td>{{ $product_image->description }}</td>
                                                        <td>
                                                            <a product_id='{{ $product_image->product_id }}'
                                                                product_image_id="{{ $product_image->product_image_id }}"
                                                                class="badge bg-light-blue editProductImageModal">
                                                                <i class="fa fa-pencil-square-o"aria-hidden="true"></i>
                                                            </a>
                                                            <a product_id='{{ $product_image->product_id }}'
                                                                product_image_id="{{ $product_image->product_image_id }}"
                                                                class="badge bg-red deleteProductImageModal">
                                                                <i class="fa fa-trash " aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="4">
                                                        {{ trans('labels.ProductsImagesRecordText') }}
                                                    </td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer text-center">
                        <button id="add_{{$result['label']}}" type="submit" class="btn btn-primary">{{ trans('labels.'.$result['operation'].$result['label']) }}</button>
                            <a href="{{ URL::to('admin/listingProduct')}}" type="button" class="btn btn-default">{{ trans('labels.back') }}</a>
                        </div>
                    </div>
                    <!-- ProductImageDialog -->
                    <div class="modal fade" id="productImageDialog" tabindex="-1" role="dialog"
                        aria-labelledby="addressLabel">
                        @include('admin/product_image/productImageDialog')
                    </div>
                    <!-- deleteProductImageModal -->
                    @include('admin/product_image/deleteProductImageDialog')
                </div>
            </div>
        </div>
    </section>
</div>
@endsection