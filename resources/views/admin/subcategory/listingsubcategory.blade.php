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
                        <h3 class="box-title">{{ trans('labels.ListingAllSubCategories') }} </h3>
                        <div class="box-tools pull-right">
                            <a href="{{ URL::to('admin/view_addSubCategory')}}" type="button"
                                class="btn btn-block btn-primary">{{ trans('labels.AddSubCategory') }}</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table-wrap" style="fro">
                                    <div class="table">
                                        <table id="subcategory" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>{{ trans('labels.ID') }}</th>
                                                    <th>{{ trans('labels.Name') }}</th>
                                                    <th>{{ trans('labels.Image') }}</th>
                                                    <th>{{ trans('labels.Icon') }}</th>
                                                    <th>{{ trans('labels.MainCategory') }}</th>
                                                    <th>{{ trans('labels.AddedLastModifiedDate') }}</th>
                                                    <th>{{ trans('labels.Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($result['subCategory'])>0)
                                                @foreach ($result['subCategory'] as $key=>$subCategory)
                                                <tr>
                                                    <td>{{ $subCategory->sub_category_id }}</td>
                                                    <td>{{ $subCategory->sub_category_name }}</td>
                                                    <td>
                                                        <img src="{{asset('').'/'.$subCategory->image}}" alt=""
                                                            width=" 100px">
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('').'/'.$subCategory->icon}}" alt=""
                                                            width=" 100px">
                                                    </td>
                                                    <td>{{ $subCategory->category_name }}</td>
                                                    <td>
                                                        <strong>{{ trans('labels.AddedDate') }}: </strong>
                                                        {{ $subCategory->create_date }}<br>
                                                        <strong>{{ trans('labels.ModifiedDate') }}:</strong>
                                                        {{ $subCategory->edit_date }}
                                                    </td>
                                                    <td>
                                                        <a data-toggle="tooltip" data-placement="bottom" title="Edit"
                                                            href="view_editSubCategory/{{ $subCategory->sub_category_id }}"
                                                            class="badge bg-light-blue">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        </a>
                                                        <a data-toggle="tooltip" data-placement="bottom"
                                                            title="{{ trans('labels.Delete') }}" id="deleteSubCategoryId"
                                                            sub_category_id="{{ $subCategory->sub_category_id }}"
                                                            class="badge bg-red">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="7">{{ trans('labels.NoRecordFound') }}</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- delete -->
         @include('admin/subcategory/deleteSubcategory')
    </section>
</div>
@endsection