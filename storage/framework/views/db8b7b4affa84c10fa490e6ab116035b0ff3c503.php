<?php $__env->startSection('content'); ?>
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> <?php echo e(trans('labels.Orders')); ?> <small><?php echo e(trans('labels.ListingAllOrders')); ?>...</small> </h1>
    <ol class="breadcrumb">
       <li><a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('labels.breadcrumb_dashboard')); ?></a></li>
      <li class="active"><?php echo e(trans('labels.Orders')); ?></li>
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
            <h3 class="box-title"><?php echo e(trans('labels.ListingAllOrders')); ?> </h3>
          </div>
          
          <!-- /.box-header -->
          <div class="box-body">
            <!--<div class="row">
              <div class="col-sm-6">
                <div class="dataTables_length" id="example1_length">
                  <label>Show
                    <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                      <option value="10">10</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                      <option value="100">100</option>
                    </select>
                    entries</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div id="example1_filter" class="dataTables_filter">
                  <label>Search:
                    <input class="form-control input-sm" placeholder="" aria-controls="example1" type="search">
                  </label>
                </div>
              </div>
            </div>-->
            <div class="row">
              <div class="col-xs-12">
              	 <?php if(count($errors) > 0): ?>
                          <?php if($errors->any()): ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <?php echo e($errors->first()); ?>

                            </div>
                          <?php endif; ?>
                      <?php endif; ?>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th><?php echo e(trans('labels.ID')); ?></th>
                      <th><?php echo e(trans('labels.CustomerName')); ?></th>
                      <th><?php echo e(trans('labels.OrderTotal')); ?></th>
                      <th><?php echo e(trans('labels.DatePurchased')); ?></th>
                      <th><?php echo e(trans('labels.Status')); ?> </th>
                      <th><?php echo e(trans('labels.Action')); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if(count($listingOrders['orders'])>0): ?>
                    <?php $__currentLoopData = $listingOrders['orders']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$orderData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($orderData->orders_id); ?></td>
                            <td><?php echo e($orderData->customers_name); ?></td>
                            <td><?php echo e($listingOrders['currency'][19]->value); ?><?php echo e($orderData->order_price); ?></td>
                            <td><?php echo e(date('d/m/Y', strtotime($orderData->date_purchased))); ?> </td>
                            <td>
                            	<?php if($orderData->orders_status_id==1): ?>
                                <span class="label label-warning">
                                <?php elseif($orderData->orders_status_id==2): ?>
                                    <span class="label label-success">
                                <?php elseif($orderData->orders_status_id==3): ?>
                                     <span class="label label-danger">
                                <?php else: ?>
                                     <span class="label label-primary">
                                <?php endif; ?>
                                <?php echo e($orderData->orders_status); ?>

                                     </span>
                            </td>
                            <td>
                            <a data-toggle="tooltip" data-placement="bottom" title="View Order" href="vieworder/<?php echo e($orderData->orders_id); ?>" class="badge bg-light-blue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            
                             <a data-toggle="tooltip" data-placement="bottom" title="Delete Order" id="deleteOrdersId" orders_id ="<?php echo e($orderData->orders_id); ?>" class="badge bg-red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            
                            </td>
                            
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php else: ?>
                  	<tr>
                    	<td colspan="6"><strong><?php echo e(trans('labels.NoRecordFound')); ?></strong></td>
                    </tr>
                  <?php endif; ?>
                  </tbody>
                </table>
                <div class="col-xs-12 text-right">
                	<?php echo e($listingOrders['orders']->links('vendor.pagination.default')); ?>

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
    
      <!-- deleteModal -->
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="deleteModalLabel"><?php echo e(trans('labels.DeleteOrder')); ?></h4>
		  </div>
		  <?php echo Form::open(array('url' =>'admin/deleteOrder', 'name'=>'deleteOrder', 'id'=>'deleteOrder', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')); ?>

				  <?php echo Form::hidden('action',  'delete', array('class'=>'form-control')); ?>

				  <?php echo Form::hidden('orders_id',  '', array('class'=>'form-control', 'id'=>'orders_id')); ?>

		  <div class="modal-body">						
			  <p><?php echo e(trans('labels.DeleteOrderText')); ?></p>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('labels.Close')); ?></button>
			<button type="submit" class="btn btn-primary" id="deleteOrder"><?php echo e(trans('labels.Delete')); ?></button>
		  </div>
		  <?php echo Form::close(); ?>

		</div>
	  </div>
	</div>
    
    <!-- Main row --> 
    
    <!-- /.row --> 
  </section>
  <!-- /.content --> 
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>