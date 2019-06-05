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
                            <a href="{{ URL::to('admin/view_addOrder') }}" type="button"
                                class="btn btn-block btn-primary">{{ trans('labels.AddNewOrder') }}</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table-wrap" style="fro">
                                    <div class="table">
                                        <table id="order" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>{{ trans('labels.ID') }}</th>
                                                    <th>{{ trans('labels.CustomerName') }}</th>
                                                    <th>{{ trans('labels.OrderTotal') }}</th>
                                                    <th>{{ trans('labels.DatePurchased') }}</th>
                                                    <th>{{ trans('labels.Status') }} </th>
                                                    <th>{{ trans('labels.Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($result['orders'])>0)
                                                @foreach ($result['orders'] as $orders)
                                                <tr>
                                                   
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
        @include('admin/Order/deleteOrder')
    </section>
</div>
@endsection