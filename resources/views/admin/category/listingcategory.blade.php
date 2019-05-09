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
                            <a href="{{ URL::to('admin/view_addCategory') }}" type="button"
                                class="btn btn-block btn-primary">{{ trans('labels.AddNewCategory') }}</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table-wrap" style="fro">
                                    <div class="table">
                                        <table id="category" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>{{ trans('labels.ID') }}</th>
                                                    <th>{{ trans('labels.Name') }}</th>
                                                    <th>{{ trans('labels.Image') }}</th>
                                                    <th>{{ trans('labels.Icon') }}</th>
                                                    <th>{{ trans('labels.AddedLastModifiedDate') }}</th>
                                                    <th>{{ trans('labels.Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($result['category'])>0)
                                                @foreach ($result['category'] as $key=>$category)
                                                <tr>
                                                    <td>{{ $category->category_id }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>
                                                        <img src="{{asset('').'/'.$category->image}}" alt=""
                                                            width=" 100px">
                                                    </td>
                                                    <td>
                                                        <img src="{{asset('').'/'.$category->icon}}" alt=""
                                                            width=" 100px">
                                                    </td>
                                                    <td>
                                                        <strong>{{ trans('labels.AddedDate') }}: </strong>
                                                        {{ $category->create_date }}<br>
                                                        <strong>{{ trans('labels.ModifiedDate') }}:
                                                        </strong>{{ $category->edit_date }} </td>
                                                    <td>
                                                        <a data-toggle="tooltip" data-placement="bottom"
                                                            title="{{ trans('labels.Edit') }}"
                                                            href="view_editCategory/{{ $category->category_id }}"
                                                            class="badge bg-light-blue">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        </a>
                                                        <a data-toggle="tooltip" data-placement="bottom"
                                                            title="{{ trans('labels.Delete') }}"
                                                            href="deleteCategory/{{ $category->category_id }}"
                                                            class="badge bg-red">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="6">{{ trans('labels.NoRecordFound') }}</td>
                                                </tr>
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
    </section>
</div>
@endsection