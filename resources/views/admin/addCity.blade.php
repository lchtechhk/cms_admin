@extends('admin.layout') @section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      {{ trans('labels.AddCity') }}
      <small>{{ trans('labels.AddCity') }}...</small>
    </h1>
    <ol class="breadcrumb">
      <li>
        <a href="{{ URL::to('admin/dashboard/this_month')}}">
          <i class="fa fa-dashboard"></i>
          {{ trans('labels.breadcrumb_dashboard') }}
        </a>
      </li>
      <li>
        <a href="listingCities">
          <i class="fa fa-dashboard"></i>{{ trans('labels.ListingAllCities') }}</a>
      </li>
      <li class="active">{{ trans('labels.AddCity') }}</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">{{ trans('labels.AddCity') }}</h3>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
                <div class="box box-info"><br>
                    @if(!empty($result['status']) && $result['status'] == 'success')
                      <div class="alert alert-success alert-dismissible" role="alert">
                    @elseif (!empty($result['status']) && $result['status'] == 'fail')
                      <div class="alert alert-danger alert-dismissible" role="alert">
                    @endif
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      @if(!empty($result['message']))
                        {{ $result['message'] }}
                      @endif
                    </div>

                  <!--<div class="box-header with-border"> <h3 class="box-title">Edit category</h3> </div>-->
                  <!-- /.box-header -->
                  <!-- form start -->
                  <div class="box-body">

                    {!! Form::open(array('url' =>'admin/addNewCity', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Country') }}<span style="color:red">★
                      </label>
                      <div class="col-sm-10 col-md-4">
                        <select name="countries_id" class='form-control field-validate'>
                          @foreach( $result['countries'] as $countries_data)
                          <option value="{{ $countries_data->id }}">
                            {{ $countries_data->name }}
                          </option>
                          @endforeach
                        </select>
                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                          {{ trans('labels.ChooseCityCountry') }}</span>
                        <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.CityName') }}<span style="color:red">★
                      </label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::text('name', '', array('class'=>'form-control field-validate', 'id'=>'name'))!!}
                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                          {{ trans('labels.CityNameText') }}</span>
                        <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.CityCode') }}
                      </label>
                      <div class="col-sm-10 col-md-4">
                        {!! Form::text('code', '', array('class'=>'form-control ', 'id'=>'code'))!!}
                        <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">
                          {{ trans('labels.CityCodeText') }}</span>
                        <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                      </div>
                    </div>

                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                      <button type="submit" class="btn btn-primary">{{ trans('labels.AddCity') }}</button>
                      <a href="listingCities" type="button" class="btn btn-default">{{ trans('labels.back') }}</a>
                    </div>
                    <!-- /.box-footer -->
                    {!! Form::close() !!}
                  </div>
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
