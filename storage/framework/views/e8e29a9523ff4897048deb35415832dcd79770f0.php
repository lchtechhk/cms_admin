<?php $__env->startSection('content'); ?>
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>  <?php echo e(trans('labels.ShippingMethods')); ?> <small><?php echo e(trans('labels.ShippingMethods')); ?>...</small> </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('labels.breadcrumb_dashboard')); ?></a></li>
      <li class="active"> <?php echo e(trans('labels.ShippingMethods')); ?></li>
    </ol>
  </section>
  
  <!--  content -->
  <section class="content"> 
    <!-- Info boxes --> 
    
    <!-- /.row -->

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"> <?php echo e(trans('labels.ShippingMethods')); ?> </h3>
          </div>
          
          <!-- /.box-header -->
          <div class="box-body">              		
          <?php if(count($errors) > 0): ?>
              <?php if($errors->any()): ?>
            <div class="row">
              <div class="col-xs-12">
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <?php echo e($errors->first()); ?>

                </div>
              </div>
            </div>
              <?php endif; ?>
          <?php endif; ?>
          
          <div class="row default-div hidden">
              <div class="col-xs-12">
                <div class="alert alert-success alert-dismissible" role="alert">
                  <!--<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                  <?php echo e(trans('labels.ShippingMethodsChangedMessage')); ?>

                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-xs-12">
                <table id="example1" class="table table-bordered table-striped" style="text-align: center;">
                  <thead>
                    <tr>
                      <th style="text-align: center;"><?php echo e(trans('labels.Default')); ?></th>
                      <th style="text-align: center;"><?php echo e(trans('labels.ShippingTitle')); ?></th>
                      <th style="text-align: center;"><?php echo e(trans('labels.Price')); ?></th>
                      <th style="text-align: center;"><?php echo e(trans('labels.Status')); ?></th>
                      <th style="text-align: center;"><?php echo e(trans('labels.Action')); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $result['shipping_methods']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$shipping_methods): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <label>
                                  <input type="radio" name="shipping_methods_id" value="1" shipping_id = '<?php echo e($shipping_methods->shipping_methods_id); ?>' class="default_method" <?php if($shipping_methods->isDefault==1): ?> checked <?php endif; ?> >
                                </label>
                            </td>
                            <td>
                                 <?php echo e($shipping_methods->name); ?>

                            </td>
                                  <?php if($shipping_methods->methods_type_link=='upsShipping' and $shipping_methods->shipping_methods_id=='1'): ?>
                                    
                                    <td>---</td>
                                    <td>
                                        <?php if($shipping_methods->status==0): ?>
                                            <span class="label label-warning">
                                            	<?php echo e(trans('labels.InActive')); ?>

                                            </span>
                                        <?php else: ?>
                                       	    <a href="<?php echo e(URL::to("admin/shippingMethods")); ?>?id=<?php echo e($shipping_methods->shipping_methods_id); ?>&active=no" class="method-status">
                                            	<?php echo e(trans('labels.InActive')); ?>

                                            </a>
                                        <?php endif; ?>
                                        &nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;
                                        <?php if($shipping_methods->status==1): ?>
                                            <span class="label label-success">
                                            	<?php echo e(trans('labels.Active')); ?>

                                            </span>
                                        <?php else: ?>
                                            <a href="<?php echo e(URL::to("admin/shippingMethods")); ?>?id=<?php echo e($shipping_methods->shipping_methods_id); ?>&active=yes" class="method-status">
                                                <?php echo e(trans('labels.Active')); ?>

                                            </a>
                                        <?php endif; ?>
                                    </td>
                                    <td><a href="<?php echo e($shipping_methods->methods_type_link); ?>" class="badge bg-light-blue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
                           			</td>
                                 <?php endif; ?>
                                 
                                 <?php if($shipping_methods->methods_type_link=='freeShipping' and $shipping_methods->shipping_methods_id=='2'): ?>
                                   <td>---</td>
                                    <td>
                                        <?php if($shipping_methods->status==0): ?>
                                            <span class="label label-warning">
                                            	<?php echo e(trans('labels.InActive')); ?> 
                                            </span>
                                        <?php else: ?>
                                       	    <a href="<?php echo e(URL::to("admin/shippingMethods")); ?>?id=<?php echo e($shipping_methods->shipping_methods_id); ?>&active=no" class="method-status">
                                            	<?php echo e(trans('labels.InActive')); ?> 
                                            </a>
                                        <?php endif; ?>
                                        &nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;
                                        <?php if($shipping_methods->status==1): ?>
                                            <span class="label label-success">
                                            	<?php echo e(trans('labels.Active')); ?> 
                                            </span>
                                        <?php else: ?>
                                            <a href="<?php echo e(URL::to("admin/shippingMethods")); ?>?id=<?php echo e($shipping_methods->shipping_methods_id); ?>&active=yes" class="method-status">
                                                <?php echo e(trans('labels.Active')); ?> 
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                    <td><a href="<?php echo e(URL::to("admin/shippingDetail/".$shipping_methods->table_name)); ?>" class="badge bg-light-blue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                 <?php endif; ?>
                                 
                                  <?php if($shipping_methods->methods_type_link=='localPickup' and $shipping_methods->shipping_methods_id=='3'): ?>
                                    <td>---</td>
                                    <td>
                                        <?php if($shipping_methods->status==0): ?>
                                            <span class="label label-warning">
                                            	<?php echo e(trans('labels.InActive')); ?>

                                            </span>
                                        <?php else: ?>
                                       	    <a href="<?php echo e(URL::to("admin/shippingMethods")); ?>?id=<?php echo e($shipping_methods->shipping_methods_id); ?>&active=no" class="method-status">
                                            	<?php echo e(trans('labels.InActive')); ?>

                                            </a>
                                        <?php endif; ?>
                                        &nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;
                                        <?php if($shipping_methods->status==1): ?>
                                            <span class="label label-success">
                                            	<?php echo e(trans('labels.Active')); ?>

                                            </span>
                                        <?php else: ?>
                                            <a href="<?php echo e(URL::to("admin/shippingMethods")); ?>?id=<?php echo e($shipping_methods->shipping_methods_id); ?>&active=yes" class="method-status">
                                               <?php echo e(trans('labels.Active')); ?> 
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                    <td><a href="<?php echo e(URL::to("admin/shippingDetail/".$shipping_methods->table_name)); ?>" class="badge bg-light-blue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                 <?php endif; ?>
                                 
                                 <?php if($shipping_methods->methods_type_link=='flateRate' and $shipping_methods->shipping_methods_id=='4'): ?>
                                    <td><?php echo e($result['flate_rate'][0]->currency); ?><?php echo e($result['flate_rate'][0]->flate_rate); ?> </td>
                                    <td>
                                        <?php if($shipping_methods->status==0): ?>
                                            <span class="label label-warning">
                                            	<?php echo e(trans('labels.InActive')); ?>

                                            </span>
                                        <?php else: ?>
                                       	    <a href="<?php echo e(URL::to("admin/shippingMethods")); ?>?id=<?php echo e($shipping_methods->shipping_methods_id); ?>&active=no" class="method-status">
                                            	<?php echo e(trans('labels.InActive')); ?>

                                            </a>
                                        <?php endif; ?>
                                        &nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;
                                        <?php if($shipping_methods->status==1): ?>
                                            <span class="label label-success">
                                            	<?php echo e(trans('labels.Active')); ?>

                                            </span>
                                        <?php else: ?>
                                            <a href="<?php echo e(URL::to("admin/shippingMethods")); ?>?id=<?php echo e($shipping_methods->shipping_methods_id); ?>&active=yes" class="method-status">
                                               <?php echo e(trans('labels.Active')); ?> 
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                    <td><a href="<?php echo e($shipping_methods->methods_type_link); ?>" class="badge bg-light-blue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
                           			</td>
                                 <?php endif; ?>
                                 
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
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
  </section>
  <!-- /.content --> 
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>