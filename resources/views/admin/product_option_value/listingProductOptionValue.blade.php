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
                        <h3 class="box-title">{{ trans('labels.ListingProductOptionValue') }} </h3>
                        <div class="box-tools pull-right">
                            <a href="{{ URL::to('admin/view_addProductOptionValue') }}" type="button"
                                class="btn btn-block btn-primary">{{ trans('labels.AddNewProductOptionValue') }}</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table-wrap" style="fro">
                                    <div class="table">
                                        <table id="productOptionValue" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>{{ trans('labels.ID') }}</th>
                                                    <th>{{ trans('labels.OptionName') }}</th>
                                                    <th>{{ trans('labels.ValueName') }}</th>
                                                    <th>{{ trans('labels.Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($result['product_option_values'])>0)
                                                @foreach ($result['product_option_values'] as $product_option_value)
                                                <tr>
                                                    <td>{{ $product_option_value->product_option_value_id }}</td>
                                                    <td>{{ $product_option_value->option_name }}</td>
                                                    <td>{{ $product_option_value->value_name }}</td>
                                                    <td>
                                                        <a data-toggle="tooltip" data-placement="bottom"
                                                            title="{{ trans('labels.Edit') }}"
                                                            href="view_editProductOptionValue/{{ $product_option_value->product_option_value_id }}"
                                                            class="badge bg-light-blue">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        </a>
                                                        <a data-toggle="tooltip" data-placement="bottom"
                                                            title="{{ trans('labels.Delete') }}"
                                                            id="deleteProductOptionValueId"
                                                            product_option_value="{{$product_option_value->product_option_value_id}}"
                                                            class="badge bg-red">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
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
        <!-- delete -->
        @include('admin/product_option_value/deleteProductOptionValue')
    </section>
</div>
@endsection