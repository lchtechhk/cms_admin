@extends('admin.layout')
@section('content')
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> {{ trans('labels.EditCity') }} <small>{{ trans('labels.EditCity') }}...</small> </h1>
    <ol class="breadcrumb">
      <li><a href="{{ URL::to('admin/dashboard/this_month')}}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
      <li><a href="../listingCities"><i class="fa fa-dashboard"></i>{{ trans('labels.ListingAllCities') }}</a></li>
      <li class="active">{{ trans('labels.EditCity') }}</li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content"> 
    <!-- Info boxes --> 
    
    <!-- /.row -->

    <div class="row">
      <div class="col-md-12">
        
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">{{ trans('labels.EditCity') }}</h3>
          </div>
          
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
              	  <div class="box box-info"><br>
                  @include('layouts/responseMessage')
                  <div class="box-body">
                    {!! Form::open(array('url' =>'admin/editCity/'.$result["city"][0]->id, 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                    {!! Form::hidden('id', $result['city'][0]->id, array('class'=>'form-control', 'id'=>'city_name'))!!}
                            
							<div class="form-group">
								<label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Country') }}<span style="color:red">★</label>
								<div class="col-sm-10 col-md-4">
                  <select name="countries_id" class='form-control field-validate'>
                        @foreach( $result['countries'] as $countries_data)
                        <option
                          @if( $countries_data->id == $result['city'][0]->countries_id)
                              selected
                            @endif
                          value="{{ $countries_data->id }}"> {{ $countries_data->name }} </option>
                        @endforeach
                    </select>
                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.ChooseCityCountry') }}</span>
                    <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
								</div>
							</div>
                            
              <div class="form-group">
                <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.CityName') }}<span style="color:red">★</span></label>
                <div class="col-sm-10 col-md-4">
                  {!! Form::text('name', $result['city'][0]->name, array('class'=>'form-control field-validate', 'id'=>'city_name'))!!}
                  <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.CityNameText') }}</span>
                  <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                </div>
							</div>
							
							<div class="form-group">
								<label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.CityCode') }}</label>
								<div class="col-sm-10 col-md-4">
									{!! Form::text('code', $result['city'][0]->code, array('class'=>'form-control', 'id'=>'city_code'))!!}
                  <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.CityCodeText') }}</span>
								</div>
							</div>
							<div class="box-footer text-center">
								<button type="submit" class="btn btn-primary">{{ trans('labels.Update') }}</button>
								<a href="../listingCities" type="button" class="btn btn-default">{{ trans('labels.back') }}</a>
							</div>
              {!! Form::close() !!}
              </div>
        </div>
    </div>
  </div>   
</div>
          
          
          <!-- /.box-body --> 
        </div>
        <!-- /.box --> 
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.row --> 
    
    <!-- Main row --> 
    
    <!-- /.row --> 
  </section>
  <!-- /.content --> 
</div>
@endsection 