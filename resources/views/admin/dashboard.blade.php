@extends('admin.layout')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ trans('labels.title_dashboard') }}
      <small>{{ trans('labels.dashboard_Version') }} 3.0</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active"><i class="fa fa-dashboard"></i> {{ trans('labels.breadcrumb_dashboard') }}</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{ $result['total_orders'] }}</h3>
            <p>{{ trans('labels.NewOrders') }}</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ URL::to('admin/orders')}}" class="small-box-footer" data-toggle="tooltip" data-placement="bottom"
            title="View All Orders">{{ trans('labels.viewAllOrders') }} <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{ $result['outOfStock'] }} </h3>
            <p>{{ trans('labels.outOfStock') }}</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{ URL::to('admin/productsstock?action=outofstock')}}" class="small-box-footer" data-toggle="tooltip"
            data-placement="bottom" title="Out of Stock">{{ trans('labels.outOfStock') }} <i
              class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{ $result['totalCustomers'] }}</h3>

            <p>{{ trans('labels.customerRegistrations') }}</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{ URL::to('admin/customers')}}" class="small-box-footer" data-toggle="tooltip"
            data-placement="bottom" title="View All Customers">{{ trans('labels.viewAllCustomers') }} <i
              class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{ $result['totalProducts'] }}</h3>

            <p>{{ trans('labels.totalProducts') }}</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="{{ URL::to('admin/products')}}" class="small-box-footer" data-toggle="tooltip"
            data-placement="bottom" title="Out of Products">{{ trans('labels.viewAllProducts') }} <i
              class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <div class="row">
      <div class="col-md-8">

        <div class="row">

          <div class="col-md-12">
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.latest_customers') }}</h3>

                <div class="box-tools pull-right">
                  <span class="label label-danger">{{ count($result['recentCustomers']) }}
                    {{ trans('labels.new_members') }}</span>
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="box-body no-padding">
                @if(count($result['recentCustomers'])>0)
                <ul class="users-list clearfix">
                  <?php $i = 1; ?>
                  @foreach ($result['recentCustomers'] as $recent)

                  @foreach ($recent as $recentCustomers)
                  @if($i<=21) <li>
                    @if(!empty($recentCustomers->customers_picture))
                    <img src="{{asset('').'/'.$recentCustomers->customers_picture}}">
                    @else
                    <img src="{{asset('').'/resources/assets/images/default_images/user.png' }}">
                    @endif
                    <a class="users-list-name"
                      href="{{ URL::to('admin/editcustomers') }}/{{ $recentCustomers->id }}">{{ $recentCustomers->customers_firstname }}
                      {{ $recentCustomers->customers_lastname }}</a>
                    <span
                      class="users-list-date">{{ date('d-M', strtotime($recentCustomers->customers_info_date_account_created)) }}</span>
                    </li>
                    @endif
                    <?php $i++; ?>
                    @endforeach
                    @endforeach
                </ul>
                @else
                <p style="padding: 8px 0 0 10px;">{{ trans('labels.no_customer_exist') }}</p>
                @endif

              </div>
              <div class="box-footer text-center">
                <a href="{{ URL::to('admin/customers')}}" class="uppercase" data-toggle="tooltip"
                  data-placement="bottom" title="View All Customers">{{ trans('labels.viewAllCustomers') }}</a>
              </div>
            </div>
          </div>
        </div>
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.NewOrders') }}</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table class="table no-margin">
                <thead>
                  <tr>
                    <th>{{ trans('labels.OrderID') }}</th>
                    <th>{{ trans('labels.CustomerName') }}</th>
                    <th>{{ trans('labels.TotalPrice') }}</th>
                    <th>{{ trans('labels.Status') }} </th>
                  </tr>
                </thead>
                <tbody>
                  @if(count($result['orders'])>0)
                  @foreach($result['orders'] as $total_orders)
                  @foreach($total_orders as $key=>$orders)
                  @if($key<=10) <tr>
                    <td><a href="{{ URL::to('admin/vieworder') }}/{{ $orders->order_id }}" data-toggle="tooltip"
                        data-placement="bottom" title="Go to detail">{{ $orders->order_id }}</a></td>
                    <td>{{ $orders->customer_name }}</td>
                    <td>{{ $result['currency'][19]->value }}{{ floatval($orders->order_price) }} </td>
                    <td>
                      @if($orders->status==1)
                      <span class="label label-warning">
                        @elseif($orders->status==2)
                        <span class="label label-success">
                          @elseif($orders->status==3)
                          <span class="label label-danger">
                            @else
                            <span class="label label-primary">
                              @endif
                              {{ $orders->status }}
                            </span>


                    </td>
                    </tr>
                    @endif
                    @endforeach
                    @endforeach
                    @else
                    <tr>
                      <td colspan="4">{{ trans('labels.noOrderPlaced') }}</td>
                    </tr>
                    @endif
                </tbody>
              </table>
            </div>
          </div>
          <div class="box-footer clearfix">
            <a href="{{ URL::to('admin/orders') }}" class="btn btn-sm btn-default btn-flat pull-right"
              data-toggle="tooltip" data-placement="bottom"
              title="View All Orders">{{ trans('labels.viewAllOrders') }}</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.GoalCompletion') }}</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <div class="progress-group">
              <span class="progress-text">{{ trans('labels.AddProductstoCart') }}</span>
              <span class="progress-number"><b>{{ $result['cart'] }}</b>/500</span>

              <div class="progress sm">
                <div class="progress-bar progress-bar-aqua" style="width: {{ $result['cart']*100/500 }}%"></div>
              </div>
            </div>
            <!-- /.progress-group -->
            @if($result['total_orders']>0)
            <div class="progress-group">
              <span class="progress-text">{{ trans('labels.CompleteOrders') }}</span>
              <span
                class="progress-number"><b>{{ $result['compeleted_orders'] }}</b>/{{ $result['total_orders'] }}</span>
              <div class="progress sm">
                <div class="progress-bar progress-bar-green"
                  style="width: {{ $result['compeleted_orders']*100/$result['total_orders'] }}%"></div>
              </div>
            </div>
            @endif
            @if($result['total_orders']>0)
            <!-- /.progress-group -->
            <div class="progress-group">
              <span class="progress-text">{{ trans('labels.PendingOrders') }}</span>
              <span class="progress-number"><b>{{ $result['pending_orders'] }}</b>/{{ $result['total_orders'] }}</span>
              <div class="progress sm">
                <div class="progress-bar progress-bar-yellow"
                  style="width: {{ $result['pending_orders']*100/$result['total_orders'] }}%"></div>
              </div>
            </div>
            @endif
            <!-- /.progress-group -->
            @if($result['total_orders']>0)
            <div class="progress-group">
              <span class="progress-text">{{ trans('labels.InprocessOrders') }}</span>
              <span class="progress-number"><b>{{ $result['inprocess'] }}</b>/{{ $result['total_orders'] }}</span>
              <div class="progress sm">
                <div class="progress-bar progress-bar-red"
                  style="width: {{ $result['inprocess']*100/$result['total_orders'] }}%"></div>
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script src="{!! asset('resources/views/admin/plugins/jQuery/jQuery-2.2.0.min.js') !!}"></script>

<script src="{!! asset('resources/views/admin/dist/js/pages/dashboard2.js') !!}"></script>
@endsection