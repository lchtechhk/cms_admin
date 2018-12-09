<?php $__env->startSection('content'); ?>
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> <?php echo e(trans('labels.StatsProductsLiked')); ?> <small><?php echo e(trans('labels.StatsProductsLiked')); ?>...</small> </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('labels.breadcrumb_dashboard')); ?></a></li>
      <li class="active"><?php echo e(trans('labels.StatsProductsLiked')); ?></li>
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
            <h3 class="box-title"><?php echo e(trans('labels.StatsProductsLiked')); ?> </h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>                      
                      <th><?php echo e(trans('labels.ID')); ?></th>
                      <th><?php echo e(trans('labels.Image')); ?></th>
                      <th><?php echo e(trans('labels.Products')); ?></th>
                      <th><?php echo e(trans('labels.Liked')); ?></th>
                      <th><?php echo e(trans('labels.View')); ?></th>
                    </tr>
                  </thead>
                   <tbody>
                    <?php $__currentLoopData = $result['data']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(++$key); ?></td>
                            <td><img src="<?php echo e(asset('').'/'.$products->products_image); ?>" alt="" width=" 100px" height="100px"></td>
                            <td width="45%">
                            	<strong><?php echo e($products->products_name); ?> <?php if(!empty($products->products_model)): ?> ( <?php echo e($products->products_model); ?> ) <?php endif; ?></strong><br>
                            </td>
                            <td>
                            	<?php echo e($products->products_liked); ?>

                            </td>
                           
                            <td>
                            	<a href="editproduct/<?php echo e($products->products_id); ?>" class="badge bg-light-blue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
                <div class="col-xs-12 text-right">
                	<?php echo e($result['data']->links('vendor.pagination.default')); ?>

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
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>