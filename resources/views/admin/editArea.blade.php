@extends('admin.layout')
@section('content')
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> {{ trans('labels.EditArea') }} <small>{{ trans('labels.EditArea') }}...</small> </h1>
    <ol class="breadcrumb">
      <li><a href="{{ URL::to('admin/dashboard/this_month')}}"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</a></li>
      <li><a href="../listingCities"><i class="fa fa-dashboard"></i>{{ trans('labels.ListingAllCities') }}</a></li>
      <li class="active">{{ trans('labels.EditArea') }}</li>
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
            <h3 class="box-title">{{ trans('labels.EditArea') }}</h3>
          </div>
          
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
              	  <div class="box box-info"><br>
                  @include('layouts/responseMessage')
                  <div class="box-body">
                    {!! Form::open(array('url' =>'admin/editArea/'.$result["area"][0]->id, 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
                    {!! Form::hidden('id', $result['area'][0]->id, array('class'=>'form-control', 'id'=>'area_name'))!!}

              <div class="form-group">
                <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.ID') }}<span style="color:red">★</label>
                <div class="col-sm-10 col-md-4">
                  {!! Form::text('id',  $result['city'][0]->id , array('class'=>'form-control', 'id'=>'id','readonly'=>'true')) !!}
                  <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.CountryNameText') }}</span>
                  <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                </div>
              </div>

							<div class="form-group">
								<label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Country') }}<span style="color:red">★</label>
								<div class="col-sm-10 col-md-4">
                  <select name="city_id" class='form-control field-validate'>
                        @foreach( $result['city'] as $city)
                        <option
                          @if( $city->id == $result['area'][0]->city_id)
                              selected
                            @endif
                          value="{{ $city->id }}"> {{ $city->name }} </option>
                        @endforeach
                    </select>
                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.ChooseCityCountry') }}</span>
                    <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
								</div>
							</div>
                            
              <div class="form-group">
                <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.AreaName') }}<span style="color:red">★</span></label>
                <div class="col-sm-10 col-md-4">
                  {!! Form::text('name', $result['area'][0]->name, array('class'=>'form-control field-validate', 'id'=>'area_name'))!!}
                  <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.AreaNameText') }}</span>
                  <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                </div>
							</div>
							
							<div class="form-group">
								<label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.AreaCode') }}</label>
								<div class="col-sm-10 col-md-4">
									{!! Form::text('code', $result['area'][0]->code, array('class'=>'form-control', 'id'=>'area_code'))!!}
                  <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.AreaCodeText') }}</span>
								</div>
							</div>

              <div class="form-group">
                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.CreateDate') }}<span style="color:red">★</label>
                  <div class="col-sm-10 col-md-4">
                    {!! Form::text('create_date',  $result['area'][0]->create_date, array('class'=>'form-control', 'id'=>'create_date','readonly'=>'true')) !!}
                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.CreateDate') }}</span>
                    <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
                  </div>
              </div>
              
              <div class="form-group">
                  <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.EditDate') }}<span style="color:red">★</label>
                  <div class="col-sm-10 col-md-4">
                    {!! Form::text('edit_date',  $result['area'][0]->edit_date, array('class'=>'form-control', 'id'=>'edit_date','readonly'=>'true')) !!}
                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;">{{ trans('labels.EditDate') }}</span>
                    <span class="help-block hidden">{{ trans('labels.textRequiredFieldMessage') }}</span>
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