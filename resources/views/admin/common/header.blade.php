@include('generic/header_function')
<script src={{App::make('url')->to('/')."/resources/assets/js/header.js"}}></script>
<header class="main-header">
    <a href="{{ URL::to('admin/dashboard/this_month')}}" class="logo">
      <span class="logo-mini" style="font-size:12px"><b>{{ trans('labels.admin') }}</b></span>
      <span class="logo-lg"><b>{{ trans('labels.admin') }}</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">{{ trans('labels.toggle_navigation') }}</span>
      </a>
      {!! Form::open(array('id' => 'change_default_company_form' ,'url' =>'admin/changeDefaultCompany', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')) !!}
      <div class="navbar-custom-menu" style="float:left;">
          <ul class="nav navbar-nav">
            <li class="dropdown messages-menu">
              <div  style="padding: 15px 15px;">
                @if(count(Session::get('owner_companies')) >0 )
                  <select name="company_id" id="company_id" class="" style="color:#000;-webkit-appearance: none;padding-left:5px;padding-right:5px;" >
                    @foreach (Session::get('owner_companies') as $own_company)
                      <option value="{{$own_company->company_id}}" 
                        @if(Session::get('default_company_id'))
                          {{header_print_selected_value('listing',Session::get('default_company_id'),$own_company->company_id)}}
                        @endif>
                        {{$own_company->company_id}} || {{$own_company->name}} || {{$own_company->email}}
                      </option>
                    @endforeach
                  </select>
                @endif
              </div>
            </li>
          </ul>
        </div>
      {!! Form::close() !!}
      <div id="countdown" style="
          width: 350px;
          margin-top: 13px !important;
          position: absolute;
          font-size: 16px;
          color: #ffffff;
          display: inline-block;
          margin-left: -175px;
          left: 50%;">
      </div>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-list-ul"></i>
              <span class="label label-success">{{ count($unseenOrders) }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">
                {{ trans('labels.you_have') }} {{ count($unseenOrders) }} {{ trans('labels.new_orders') }}
              </li>
              <li>
                <ul class="menu">
                  @foreach($unseenOrders as $unseenOrder)
                    <li>
                      <a href="{{ URL::to("admin/viewOrder")}}/{{ $unseenOrder->orders_id}}">
                        <div class="pull-left">
                          
                          @if(!empty($unseenOrder->customers_picture))
                              <img src="{{asset('').'/'.$unseenOrder->customers_picture}}" class="img-circle" alt="{{ $unseenOrder->customers_name }} Image">
                              @else
                              <img src="{{asset('').'/resources/assets/images/default_images/user.png' }}" class="img-circle" alt="{{ $unseenOrder->customers_name }} Image">
                          @endif
                                                    
                        </div>
                        <h4>
                          {{ $unseenOrder->customers_name }}
                          <small><i class="fa fa-clock-o"></i> {{ date('d/m/Y', strtotime($unseenOrder->date_purchased)) }}</small>
                        </h4>
                        <p>Ordered Products ({{ $unseenOrder->total_products}})</p>
                      </a>
                    </li>
                  @endforeach
                </ul>
              </li>
            </ul>
          </li>
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-users"></i>
              <span class="label label-warning">{{ count($newCustomers) }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">
                {{ count($newCustomers) }} 
                {{ trans('labels.new_users') }}
              </li>
              <li>
                <ul class="menu">
                  @foreach($newCustomers as $newCustomer)
                    <li>
                      <a href="{{ URL::to("admin/editCustomers")}}/{{ $newCustomer->id}}">
                        <div class="pull-left">
                          @if(!empty($newCustomer->customers_picture))
                              <img src="{{asset('').'/'.$newCustomer->customers_picture}}" class="img-circle">
                              @else
                              <img src="{{asset('').'/resources/assets/images/default_images/user.png' }}" class="img-circle" alt="{{ $newCustomer->customers_firstname }} Image">
                          @endif
                        </div>
                        <h4>
                          {{ $newCustomer->customers_firstname }} {{ $newCustomer->customers_lastname }}
                        </h4>
                        <p></p>
                      </a>
                    </li>
                  @endforeach
                </ul>
              </li>
            </ul>
          </li>
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-th"></i>
              <span class="label label-warning">{{ count($lowInQunatity) }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">{{ count($lowInQunatity) }} {{ trans('labels.products_are_in_low_quantity') }}</li>
              <li>
                <ul class="menu">
                @foreach($lowInQunatity as $lowInQunatity)
                  <li>
                    <a href="{{ URL::to("admin/editProduct")}}/{{ $lowInQunatity->products_id}}">
                      <div class="pull-left">                         
                         <img src="{{asset('').'/'.$lowInQunatity->products_image}}" class="img-circle" >
                      </div>
                      <h4 style="white-space: normal;">
                        {{ $lowInQunatity->products_name }} 
                      </h4>
                      <p></p>
                    </a>
                  </li>
                @endforeach
                  <!-- end message -->
                </ul>
              </li>
              <!--<li class="footer"><a href="#">See All Messages</a></li>-->
            </ul>
          </li>
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('').auth()->guard('admin')->user()->image}}" class="user-image" alt="{{ auth()->guard('admin')->user()->first_name }} {{ auth()->guard('admin')->user()->last_name }} Image">
              <span class="hidden-xs">{{ auth()->guard('admin')->user()->first_name }} {{ auth()->guard('admin')->user()->last_name }} </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('').auth()->guard('admin')->user()->image}}" class="img-circle" alt="{{ auth()->guard('admin')->user()->first_name }} {{ auth()->guard('admin')->user()->last_name }} Image">
                <p>
                  {{ auth()->guard('admin')->user()->first_name }} {{ auth()->guard('admin')->user()->last_name }} 
                  <small>{{ trans('labels.administrator')}}</small>
                </p>
              </li>
              <!-- Menu Body -->
              <!--<li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
              </li>-->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ URL::to('admin/adminProfile')}}" class="btn btn-default btn-flat">{{ trans('labels.profile_link')}}</a>
                </div>
                <div class="pull-right">
                  <a href="{{ URL::to('admin/logout')}}" class="btn btn-default btn-flat">{{ trans('labels.sign_out') }}</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!--<li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>-->
        </ul>
      </div>

    </nav>
  </header>