<?php $__env->startSection('content'); ?>
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>  <?php echo e(trans('labels.Devices')); ?> <small><?php echo e(trans('labels.ListingDevices')); ?>...</small> </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('labels.breadcrumb_dashboard')); ?></a></li>
      <li class="active"> <?php echo e(trans('labels.Devices')); ?></li>
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
            <h3 class="box-title"><?php echo e(trans('labels.ListingDevices')); ?> </h3>
          </div>
          
          <!-- /.box-header -->
          <div class="box-body">
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
              <div class="pull-right col-xs-12 col-sm-4">
                 <?php echo Form::open(array( 'method'=>'get', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')); ?>

                    <div class="form-group">
                        <label for="name" class="control-label col-sm-3"><?php echo e(trans('labels.Filter')); ?> </label>
                        <div class="col-sm-9">
                          <select class="form-control" name="filter" onChange="this.form.submit()">
                            <?php if($web_setting[66]->value=='1' and $web_setting[67]->value=='1' or $web_setting[66]->value=='1' and $web_setting[67]->value=='0'): ?>
                            <option value=""><?php echo e(trans('labels.All')); ?></option>
                            <?php endif; ?>
                            <?php if($web_setting[66]->value=='1'): ?>
                            <option value="1" <?php if(isset($_REQUEST['filter']) and $_REQUEST['filter']=='1'): ?> selected <?php endif; ?>><?php echo e(trans('labels.IOS')); ?> </option>
                            <option value="2" <?php if(isset($_REQUEST['filter']) and $_REQUEST['filter']=='2'): ?> selected <?php endif; ?>><?php echo e(trans('labels.Android')); ?></option>
                            <?php endif; ?>
                            <?php if($web_setting[67]->value=='1'): ?>
                            <option value="3" <?php if(isset($_REQUEST['filter']) and $_REQUEST['filter']=='3'): ?> selected <?php endif; ?>><?php echo e(trans('labels.Website')); ?></option>
                            <?php endif; ?>
                          </select>
                        </div>
                    </div>
                 <?php echo Form::close(); ?>

            </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th><?php echo e(trans('labels.ID')); ?></th>
                      <th><?php echo e(trans('labels.DeviceDetail')); ?></th> 
                      <th><?php echo e(trans('labels.DeviceOS')); ?></th>  
                      <th><?php echo e(trans('labels.UserInfo')); ?></th>
                      <th><?php echo e(trans('labels.Status')); ?></th>
                      <th><?php echo e(trans('labels.Action')); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(count($result['devices'])>0): ?>
                        <?php $__currentLoopData = $result['devices']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$device): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($device->id); ?></td>
                                <td>
                                    <strong>Device Type: </strong>
                                    <?php if($device->device_type == '1'): ?>
                                        <?php echo e(trans('labels.IOS')); ?>

                                    <?php elseif($device->device_type == '2'): ?>
                                        <?php echo e(trans('labels.Android')); ?>

                                    <?php elseif($device->device_type == '3'): ?>
                                       <?php echo e(trans('labels.Website')); ?> 
                                    <?php endif; ?>
                                    <br>
                                    <strong><?php echo e(trans('labels.Manufacturer')); ?>: </strong><?php echo e($device->manufacturer); ?>

                                    <br>
                                    <strong><?php echo e(trans('labels.DeviceModel')); ?>: </strong><?php echo e($device->device_model); ?>

                                    <br>
                                    <strong><?php echo e(trans('labels.RegisterDate')); ?>: </strong><?php echo e(date('d/m/Y', $device->register_date)); ?>

                                    
                                </td>
                                
                                <td><?php echo e($device->device_os); ?></td>
                                
                                <td><?php echo e($device->customers_firstname); ?> <?php echo e($device->customers_lastname); ?></td>
                                
                                <td>
                               			<?php if($device->status==0): ?>
                                            <span class="label label-warning">
                                            	<?php echo e(trans('labels.InActive')); ?>

                                            </span>
                                        <?php else: ?>
                                       	    <a href="<?php echo e(URL::to("admin/listingDevices")); ?>?id=<?php echo e($device->id); ?>&active=no" class="method-status">
                                            	<?php echo e(trans('labels.InActive')); ?>

                                            </a>
                                        <?php endif; ?>
                                        &nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;
                                        <?php if($device->status==1): ?>
                                            <span class="label label-success">
                                            	<?php echo e(trans('labels.Active')); ?>

                                            </span>
                                        <?php else: ?>
                                            <a href="<?php echo e(URL::to("admin/listingDevices")); ?>?id=<?php echo e($device->id); ?>&active=yes" class="method-status">
                                               <?php echo e(trans('labels.Active')); ?> 
                                            </a>
                                        <?php endif; ?>                                	
                                </td>
                                
                                <td>
                                	<a data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('labels.SendNotification')); ?>" href="viewdevices/<?php echo e($device->id); ?>" class="badge bg-light-blue btn btn-primary"><?php echo e(trans('labels.Send')); ?></a> 
                                	<!--<a data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('labels.DeleteDevice')); ?>" id="deletedeviceId" devices_id ="<?php echo e($device->id); ?>" class="badge bg-red btn btn-danger"><?php echo e(trans('labels.Delete')); ?></a>-->
                               </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    	<tr>
                        	<td colspan="6"><?php echo e(trans('labels.NoRecordFound')); ?></td>
                        </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
                <div class="col-xs-12 text-right">
                	<?php echo e($result['devices']->links('vendor.pagination.default')); ?>

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
        <!-- deletedeviceModal -->
	<div class="modal fade" id="deletedeviceModal" tabindex="-1" role="dialog" aria-labelledby="deletedeviceModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="deletedeviceModalLabel"><?php echo e(trans('labels.DeleteDevice')); ?></h4>
		  </div>
		  <?php echo Form::open(array('url' =>'admin/deletedevice', 'name'=>'deletedevice', 'id'=>'deletedevice', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')); ?>

				  <?php echo Form::hidden('action',  'delete', array('class'=>'form-control')); ?>

				  <?php echo Form::hidden('id',  '', array('class'=>'form-control', 'id'=>'devices_id')); ?>

		  <div class="modal-body">						
			  <p><?php echo e(trans('labels.DeleteDeviceText')); ?></p>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('labels.Close')); ?>Close</button>
			<button type="submit" class="btn btn-primary" id="deletedevice"><?php echo e(trans('labels.Delete')); ?>Delete</button>
		  </div>
		  <?php echo Form::close(); ?>

		</div>
	  </div>
	</div>
    
    <!--  row --> 
    
    <!-- /.row --> 
  </section>
  <!-- /.content --> 
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>