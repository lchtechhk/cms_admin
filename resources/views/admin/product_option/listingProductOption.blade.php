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
                            <a href="{{ URL::to('admin/view_addProductOption') }}" type="button"
                                class="btn btn-block btn-primary">{{ trans('labels.AddNewProductOption') }}</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table-wrap" style="fro">
                                    <div class="table">
                                        <table id="productOption" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>{{ trans('labels.ID') }}</th>
                                                    <th>{{ trans('labels.Name') }}</th>
                                                    <th>{{ trans('labels.Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($result['product_options'])>0)
                                                @foreach ($result['product_options'] as $product_option)
                                                <tr>
                                                    <td>{{ $product_option->product_option_id }}</td>
                                                    <td>{{ $product_option->product_option_name }}</td>
                                                    <td>
                                                        <a data-toggle="tooltip" data-placement="bottom"
                                                            title="{{ trans('labels.Edit') }}"
                                                            href="view_editProductOption/{{ $product_option->product_option_id }}"
                                                            class="badge bg-light-blue">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        </a>
                                                        <a data-toggle="tooltip" data-placement="bottom"
                                                            title="{{ trans('labels.Delete') }}"
                                                            id="deleteManufacturerId"
                                                            product_option_id="{{$product_option->product_option_id}}"
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
        @include('admin/Manufacturer/deleteManufacturer')
    </section>
</div>
@endsection