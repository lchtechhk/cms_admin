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
                            <a href="{{ URL::to('admin/view_addManufacturer') }}" type="button"
                                class="btn btn-block btn-primary">{{ trans('labels.AddNewManufacturer') }}</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table-wrap" style="fro">
                                    <div class="table">
                                        <table id="manufacturer" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>{{ trans('labels.ID') }}</th>
                                                    <th>{{ trans('labels.Name') }}</th>
                                                    <th>{{ trans('labels.Image') }}</th>
                                                    <th>{{ trans('labels.Link') }}</th>
                                                    <th>{{ trans('labels.Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    @if (count($result['manufacturers'])>0)
                                                        @foreach ($result['manufacturers'] as $manufacturer)
                                                            <td>{{ $manufacturer->manufacturer_id }}</td>
                                                            <td>{{ $manufacturer->name }}</td>
                                                            <td>
                                                                @if(!empty($listingCustomers->customers_picture))
                                                                    <img src="../{{ $manufacturer->image }}" style="width: 50px; float: left; margin-right: 10px">
                                                                @else
                                                                    <img src="../resources/assets/images/default_images/manufacturer.png" style="width: 50px; float: left; margin-right: 10px">
                                                                @endif 
                                                            </td>
                                                            <td><a href="{{ $manufacturer->url }}" target="_blank">Website Link</a></td>
                                                            <td>
                                                                <a data-toggle="tooltip" data-placement="bottom"
                                                                    title="{{ trans('labels.Edit') }}"
                                                                    href="view_editManufacturer/{{ $manufacturer->manufacturer_id }}"
                                                                    class="badge bg-light-blue">
                                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                </a>
                                                                <a data-toggle="tooltip" data-placement="bottom"
                                                                    title="{{ trans('labels.Delete') }}" id="deleteManufacturerId"
                                                                    manufacturer_id="{{$manufacturer->manufacturer_id}}"
                                                                    class="badge bg-red">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                </a>
                                                            </td>
                                                        @endforeach
                                                    @else
                                                        <td colspan="5">{{ trans('labels.NoRecordFound') }}</td>
                                                    @endif
                                                </tr>
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