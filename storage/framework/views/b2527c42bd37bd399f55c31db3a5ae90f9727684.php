<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo e(trans('labels.title_dashboard')); ?>

      <small><?php echo e(trans('labels.dashboard_Version')); ?> 3.0</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active"><i class="fa fa-dashboard"></i> <?php echo e(trans('labels.breadcrumb_dashboard')); ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?php echo e($result['total_orders']); ?></h3>
            <p><?php echo e(trans('labels.NewOrders')); ?></p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="<?php echo e(URL::to('admin/orders')); ?>" class="small-box-footer" data-toggle="tooltip" data-placement="bottom"
            title="View All Orders"><?php echo e(trans('labels.viewAllOrders')); ?> <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">

        <div class="small-box bg-red">
          <div class="inner">
            <h3><?php echo e($result['outOfStock']); ?> </h3>
            <p><?php echo e(trans('labels.outOfStock')); ?></p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="<?php echo e(URL::to('admin/productsstock?action=outofstock')); ?>" class="small-box-footer" data-toggle="tooltip"
            data-placement="bottom" title="Out of Stock"><?php echo e(trans('labels.outOfStock')); ?> <i
              class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?php echo e($result['totalCustomers']); ?></h3>

            <p><?php echo e(trans('labels.customerRegistrations')); ?></p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="<?php echo e(URL::to('admin/customers')); ?>" class="small-box-footer" data-toggle="tooltip"
            data-placement="bottom" title="View All Customers"><?php echo e(trans('labels.viewAllCustomers')); ?> <i
              class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?php echo e($result['totalProducts']); ?></h3>

            <p><?php echo e(trans('labels.totalProducts')); ?></p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="<?php echo e(URL::to('admin/products')); ?>" class="small-box-footer" data-toggle="tooltip"
            data-placement="bottom" title="Out of Products"><?php echo e(trans('labels.viewAllProducts')); ?> <i
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
                <h3 class="box-title"><?php echo e(trans('labels.latest_customers')); ?></h3>

                <div class="box-tools pull-right">
                  <span class="label label-danger"><?php echo e(count($result['recentCustomers'])); ?>

                    <?php echo e(trans('labels.new_members')); ?></span>
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="box-body no-padding">
                <?php if(count($result['recentCustomers'])>0): ?>
                <ul class="users-list clearfix">
                  <?php $i = 1; ?>
                  <?php $__currentLoopData = $result['recentCustomers']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <?php $__currentLoopData = $recent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recentCustomers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($i<=21): ?> <li>
                    <?php if(!empty($recentCustomers->customers_picture)): ?>
                    <img src="<?php echo e(asset('').'/'.$recentCustomers->customers_picture); ?>">
                    <?php else: ?>
                    <img src="<?php echo e(asset('').'/resources/assets/images/default_images/user.png'); ?>">
                    <?php endif; ?>
                    <a class="users-list-name"
                      href="<?php echo e(URL::to('admin/editcustomers')); ?>/<?php echo e($recentCustomers->id); ?>"><?php echo e($recentCustomers->customers_firstname); ?>

                      <?php echo e($recentCustomers->customers_lastname); ?></a>
                    <span
                      class="users-list-date"><?php echo e(date('d-M', strtotime($recentCustomers->customers_info_date_account_created))); ?></span>
                    </li>
                    <?php endif; ?>
                    <?php $i++; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <?php else: ?>
                <p style="padding: 8px 0 0 10px;"><?php echo e(trans('labels.no_customer_exist')); ?></p>
                <?php endif; ?>

              </div>
              <div class="box-footer text-center">
                <a href="<?php echo e(URL::to('admin/customers')); ?>" class="uppercase" data-toggle="tooltip"
                  data-placement="bottom" title="View All Customers"><?php echo e(trans('labels.viewAllCustomers')); ?></a>
              </div>
            </div>
          </div>
        </div>
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans('labels.NewOrders')); ?></h3>

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
                    <th><?php echo e(trans('labels.OrderID')); ?></th>
                    <th><?php echo e(trans('labels.CustomerName')); ?></th>
                    <th><?php echo e(trans('labels.TotalPrice')); ?></th>
                    <th><?php echo e(trans('labels.Status')); ?> </th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(count($result['orders'])>0): ?>
                  <?php $__currentLoopData = $result['orders']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $total_orders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php $__currentLoopData = $total_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$orders): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($key<=10): ?> <tr>
                    <td><a href="<?php echo e(URL::to('admin/vieworder')); ?>/<?php echo e($orders->orders_id); ?>" data-toggle="tooltip"
                        data-placement="bottom" title="Go to detail"><?php echo e($orders->orders_id); ?></a></td>
                    <td><?php echo e($orders->customers_name); ?></td>
                    <td><?php echo e($result['currency'][19]->value); ?><?php echo e(floatval($orders->total_price)); ?> </td>
                    <td>
                      <?php if($orders->orders_status_id==1): ?>
                      <span class="label label-warning">
                        <?php elseif($orders->orders_status_id==2): ?>
                        <span class="label label-success">
                          <?php elseif($orders->orders_status_id==3): ?>
                          <span class="label label-danger">
                            <?php else: ?>
                            <span class="label label-primary">
                              <?php endif; ?>
                              <?php echo e($orders->orders_status); ?>

                            </span>


                    </td>
                    </tr>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <tr>
                      <td colspan="4"><?php echo e(trans('labels.noOrderPlaced')); ?></td>
                    </tr>
                    <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="box-footer clearfix">
            <a href="<?php echo e(URL::to('admin/orders')); ?>" class="btn btn-sm btn-default btn-flat pull-right"
              data-toggle="tooltip" data-placement="bottom"
              title="View All Orders"><?php echo e(trans('labels.viewAllOrders')); ?></a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans('labels.GoalCompletion')); ?></h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <div class="progress-group">
              <span class="progress-text"><?php echo e(trans('labels.AddProductstoCart')); ?></span>
              <span class="progress-number"><b><?php echo e($result['cart']); ?></b>/500</span>

              <div class="progress sm">
                <div class="progress-bar progress-bar-aqua" style="width: <?php echo e($result['cart']*100/500); ?>%"></div>
              </div>
            </div>
            <!-- /.progress-group -->
            <?php if($result['total_orders']>0): ?>
            <div class="progress-group">
              <span class="progress-text"><?php echo e(trans('labels.CompleteOrders')); ?></span>
              <span
                class="progress-number"><b><?php echo e($result['compeleted_orders']); ?></b>/<?php echo e($result['total_orders']); ?></span>
              <div class="progress sm">
                <div class="progress-bar progress-bar-green"
                  style="width: <?php echo e($result['compeleted_orders']*100/$result['total_orders']); ?>%"></div>
              </div>
            </div>
            <?php endif; ?>
            <?php if($result['total_orders']>0): ?>
            <!-- /.progress-group -->
            <div class="progress-group">
              <span class="progress-text"><?php echo e(trans('labels.PendingOrders')); ?></span>
              <span class="progress-number"><b><?php echo e($result['pending_orders']); ?></b>/<?php echo e($result['total_orders']); ?></span>
              <div class="progress sm">
                <div class="progress-bar progress-bar-yellow"
                  style="width: <?php echo e($result['pending_orders']*100/$result['total_orders']); ?>%"></div>
              </div>
            </div>
            <?php endif; ?>
            <!-- /.progress-group -->
            <?php if($result['total_orders']>0): ?>
            <div class="progress-group">
              <span class="progress-text"><?php echo e(trans('labels.InprocessOrders')); ?></span>
              <span class="progress-number"><b><?php echo e($result['inprocess']); ?></b>/<?php echo e($result['total_orders']); ?></span>
              <div class="progress sm">
                <div class="progress-bar progress-bar-red"
                  style="width: <?php echo e($result['inprocess']*100/$result['total_orders']); ?>%"></div>
              </div>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script src="<?php echo asset('resources/views/admin/plugins/jQuery/jQuery-2.2.0.min.js'); ?>"></script>

<script src="<?php echo asset('resources/views/admin/dist/js/pages/dashboard2.js'); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>