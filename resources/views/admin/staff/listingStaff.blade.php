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
                        <h3 class="box-title">{{ trans('labels.ListingAll'.$result['label']) }} </h3>
                        <div class="box-tools pull-right">
                            <a href="{{ URL::to('admin/view_add'.$result['label']) }}" type="button"
                                class="btn btn-block btn-primary">{{ trans('labels.AddNew'.$result['label']) }}</a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table-wrap" style="fro">
                                    <div class="table">
                                        <table id="staff" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>{{ trans('labels.ID') }}</th>
                                                    <th>{{ trans('labels.Image') }}</th>
                                                    <th>{{ trans('labels.StaffName') }}</th>
                                                    <th>{{ trans('labels.Gender') }}</th>
                                                    <th>{{ trans('labels.Email') }}</th>
                                                    <th>{{ trans('labels.DOB') }}</th>
                                                    <th>{{ trans('labels.Phone') }}</th>
                                                    <th>{{ trans('labels.CreateDate') }}</th>
                                                    <th>{{ trans('labels.Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($result['staffs'])>0)
                                                @foreach ($result['staffs'] as $staff)
                                                    <tr>
                                                        <td>{{ $staff->user_id }}</td>
                                                        <td>
                                                            @if(!empty($staff->image))
                                                                <img src="{{asset('').'/'.$staff->image}}" alt="" width=" 100px">
                                                            @else
                                                                <img src={{asset('')."resources/assets/images/default_images/user.png"}}
                                                                style="width: 50px; float: left; margin-right: 10px">
                                                            @endif
                                                        </td>
                                                        <td>{{ $staff->last_name }} {{ $staff->first_name }}</td>
                                                        <td>{{ $staff->gender }}</td>
                                                        <td>{{ $staff->email }}</td>
                                                        <td>{{ $staff->dob }}</td>
                                                        <td>{{ $staff->phone }}</td>
                                                        <td>{{ $staff->create_date }}</td>
                                                        <td>
                                                            <a data-toggle="tooltip" data-placement="bottom" title="View Staff" href="view_editStaff/{{ $staff->user_id }}" class="badge bg-light-blue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                            <a data-toggle="tooltip" data-placement="bottom" title="Delete Staff" id="deleteStaffFrom" staff_id ="{{ $staff->user_id }}" class="badge bg-red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                @else
                                                <td colspan="8">{{ trans('labels.NoRecordFound') }}</td>
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
        @include('admin/staff/deleteStaffDialog')
    </section>
</div>
@endsection