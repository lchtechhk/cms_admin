<?php $__env->startSection('content'); ?>
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> <?php echo e(trans('labels.alertSetting')); ?> <small><?php echo e(trans('labels.alertSetting')); ?>...</small> </h1>
    <ol class="breadcrumb">
       <li><a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('labels.breadcrumb_dashboard')); ?></a></li>
      <li class="active"><?php echo e(trans('labels.alertSetting')); ?></li>
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
            <h3 class="box-title"><?php echo e(trans('labels.alertSetting')); ?> </h3>
          </div>
          
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
              		<div class="box box-info">
                        <!--<div class="box-header with-border">
                          <h3 class="box-title">Setting</h3>
                        </div>-->
                        <!-- /.box-header -->
                        <!-- form start -->                        
                         <div class="box-body">
                          <?php if( count($errors) > 0): ?>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="alert alert-success" role="alert">
                                      <span class="icon fa fa-check" aria-hidden="true"></span>
                                      <span class="sr-only"><?php echo e(trans('labels.Setting')); ?>Error:</span>
                                      <?php echo e($error); ?>

                                </div>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                        
                            <?php echo Form::open(array('url' =>'admin/updateAlertSetting', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')); ?>

                            	
                            <?php echo Form::hidden('alert_id',  $result['setting'][0]->alert_id, array('class'=>'form-control', 'id'=>'alert_id')); ?>

                        
                            
                            <div class="form-group">
                           		<label for="shippingEnvironment" class="col-sm-2 col-md-3 control-label" style=""><?php echo e(trans('labels.createcustomeremail')); ?></label>
                                <div class="col-sm-10 col-md-4">
                                    <label class=" control-label">
                                          <input type="radio" name="create_customer_email" value="1" class="flat-red" <?php if($result['setting'][0]->create_customer_email==1): ?> checked <?php endif; ?> > &nbsp;<?php echo e(trans('labels.Yes')); ?>

                                    </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
                                    <label class=" control-label">
                                          <input type="radio" name="create_customer_email" value="0" class="flat-red" <?php if($result['setting'][0]->create_customer_email==0): ?> checked <?php endif; ?> >  &nbsp;<?php echo e(trans('labels.No')); ?>

                                    </label>
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.createcustomeremailtext')); ?></span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                           		<label for="shippingEnvironment" class="col-sm-2 col-md-3 control-label" style=""><?php echo e(trans('labels.createcustomernotification')); ?></label>
                                <div class="col-sm-10 col-md-4">
                                    <label class=" control-label">
                                          <input type="radio" name="create_customer_notification" value="1" class="flat-red" <?php if($result['setting'][0]->create_customer_notification==1): ?> checked <?php endif; ?> > &nbsp;<?php echo e(trans('labels.Yes')); ?>

                                    </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
                                    <label class=" control-label">
                                          <input type="radio" name="create_customer_notification" value="0" class="flat-red" <?php if($result['setting'][0]->create_customer_notification==0): ?> checked <?php endif; ?> >  &nbsp;<?php echo e(trans('labels.No')); ?>

                                    </label>
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.createcustomernotificationtext')); ?></span>
                                </div>
                            </div>                            
                            
                            <hr>
                            
                            <div class="form-group">
                           		<label for="shippingEnvironment" class="col-sm-2 col-md-3 control-label" style=""><?php echo e(trans('labels.orderemail')); ?></label>
                                <div class="col-sm-10 col-md-4">
                                    <label class=" control-label">
                                          <input type="radio" name="order_email" value="1" class="flat-red" <?php if($result['setting'][0]->order_email==1): ?> checked <?php endif; ?> > &nbsp;<?php echo e(trans('labels.Yes')); ?>

                                    </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
                                    <label class=" control-label">
                                          <input type="radio" name="order_email" value="0" class="flat-red" <?php if($result['setting'][0]->order_email==0): ?> checked <?php endif; ?> >  &nbsp;<?php echo e(trans('labels.No')); ?>

                                    </label>
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.orderemailText')); ?></span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                           		<label for="shippingEnvironment" class="col-sm-2 col-md-3 control-label" style=""><?php echo e(trans('labels.ordernotification')); ?></label>
                                <div class="col-sm-10 col-md-4">
                                    <label class=" control-label">
                                          <input type="radio" name="order_notification" value="1" class="flat-red" <?php if($result['setting'][0]->order_notification==1): ?> checked <?php endif; ?> > &nbsp;<?php echo e(trans('labels.Yes')); ?>

                                    </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
                                    <label class=" control-label">
                                          <input type="radio" name="order_notification" value="0" class="flat-red" <?php if($result['setting'][0]->order_notification==0): ?> checked <?php endif; ?> >  &nbsp;<?php echo e(trans('labels.No')); ?>

                                    </label>
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.ordernotificationText')); ?></span>
                                </div>
                            </div>
                            
                            <hr>
                            
                            <div class="form-group">
                           		<label for="shippingEnvironment" class="col-sm-2 col-md-3 control-label" style=""><?php echo e(trans('labels.orderstatusemail')); ?></label>
                                <div class="col-sm-10 col-md-4">
                                    <label class=" control-label">
                                          <input type="radio" name="order_status_email" value="1" class="flat-red" <?php if($result['setting'][0]->order_status_email==1): ?> checked <?php endif; ?> > &nbsp;<?php echo e(trans('labels.Yes')); ?>

                                    </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
                                    <label class=" control-label">
                                          <input type="radio" name="order_status_email" value="0" class="flat-red" <?php if($result['setting'][0]->order_status_email==0): ?> checked <?php endif; ?> >  &nbsp;<?php echo e(trans('labels.No')); ?>

                                    </label>
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.createcustomeremailtext')); ?></span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                           		<label for="shippingEnvironment" class="col-sm-2 col-md-3 control-label" style=""><?php echo e(trans('labels.orderstatusnotification')); ?></label>
                                <div class="col-sm-10 col-md-4">
                                    <label class=" control-label">
                                          <input type="radio" name="order_status_notification" value="1" class="flat-red" <?php if($result['setting'][0]->order_status_notification==1): ?> checked <?php endif; ?> > &nbsp;<?php echo e(trans('labels.Yes')); ?>

                                    </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
                                    <label class=" control-label">
                                          <input type="radio" name="order_status_notification" value="0" class="flat-red" <?php if($result['setting'][0]->order_status_notification==0): ?> checked <?php endif; ?> >  &nbsp;<?php echo e(trans('labels.No')); ?>

                                    </label>
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.orderstatusnotificationtext')); ?></span>
                                </div>
                            </div>                            
                            
                            <hr>
                            
                            <div class="form-group">
                           		<label for="shippingEnvironment" class="col-sm-2 col-md-3 control-label" style=""><?php echo e(trans('labels.newproductemail')); ?></label>
                                <div class="col-sm-10 col-md-4">
                                    <label class=" control-label">
                                          <input type="radio" name="new_product_email" value="1" class="flat-red" <?php if($result['setting'][0]->new_product_email==1): ?> checked <?php endif; ?> > &nbsp;<?php echo e(trans('labels.Yes')); ?>

                                    </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
                                    <label class=" control-label">
                                          <input type="radio" name="new_product_email" value="0" class="flat-red" <?php if($result['setting'][0]->new_product_email==0): ?> checked <?php endif; ?> >  &nbsp;<?php echo e(trans('labels.No')); ?>

                                    </label>
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.newproductemailtext')); ?></span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                           		<label for="shippingEnvironment" class="col-sm-2 col-md-3 control-label" style=""><?php echo e(trans('labels.newproductnotification')); ?></label>
                                <div class="col-sm-10 col-md-4">
                                    <label class=" control-label">
                                          <input type="radio" name="new_product_notification" value="1" class="flat-red" <?php if($result['setting'][0]->new_product_notification==1): ?> checked <?php endif; ?> > &nbsp;<?php echo e(trans('labels.Yes')); ?>

                                    </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
                                    <label class=" control-label">
                                          <input type="radio" name="new_product_notification" value="0" class="flat-red" <?php if($result['setting'][0]->new_product_notification==0): ?> checked <?php endif; ?> >  &nbsp;<?php echo e(trans('labels.No')); ?>

                                    </label>
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.newproductnotificationtext')); ?></span>
                                </div>
                            </div>                            
                            
                            <hr>
                            
                            <div class="form-group">
                           		<label for="shippingEnvironment" class="col-sm-2 col-md-3 control-label" style=""><?php echo e(trans('labels.forgotemail')); ?></label>
                                <div class="col-sm-10 col-md-4">
                                    <label class=" control-label">
                                          <input type="radio" name="forgot_email" value="1" class="flat-red" <?php if($result['setting'][0]->forgot_email==1): ?> checked <?php endif; ?> > &nbsp;<?php echo e(trans('labels.Yes')); ?>

                                    </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
                                    <label class=" control-label">
                                          <input type="radio" name="forgot_email" value="0" class="flat-red" <?php if($result['setting'][0]->forgot_email==0): ?> checked <?php endif; ?> >  &nbsp;<?php echo e(trans('labels.No')); ?>

                                    </label>
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.newproductemailtext')); ?></span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                           		<label for="shippingEnvironment" class="col-sm-2 col-md-3 control-label" style=""><?php echo e(trans('labels.forgotemailnotification')); ?></label>
                                <div class="col-sm-10 col-md-4">
                                    <label class=" control-label">
                                          <input type="radio" name="forgot_notification" value="1" class="flat-red" <?php if($result['setting'][0]->forgot_notification==1): ?> checked <?php endif; ?> > &nbsp;<?php echo e(trans('labels.Yes')); ?>

                                    </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
                                    <label class=" control-label">
                                          <input type="radio" name="forgot_notification" value="0" class="flat-red" <?php if($result['setting'][0]->forgot_notification==0): ?> checked <?php endif; ?> >  &nbsp;<?php echo e(trans('labels.No')); ?>

                                    </label>
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.forgotemailnotificationtext')); ?></span>
                                </div>
                            </div>                         
                            
                            <hr>
                            
                            <div class="form-group">
                           		<label for="shippingEnvironment" class="col-sm-2 col-md-3 control-label" style=""><?php echo e(trans('labels.newsemail')); ?></label>
                                <div class="col-sm-10 col-md-4">
                                    <label class=" control-label">
                                          <input type="radio" name="news_email" value="1" class="flat-red" <?php if($result['setting'][0]->news_email==1): ?> checked <?php endif; ?> > &nbsp;<?php echo e(trans('labels.Yes')); ?>

                                    </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
                                    <label class=" control-label">
                                          <input type="radio" name="news_email" value="0" class="flat-red" <?php if($result['setting'][0]->news_email==0): ?> checked <?php endif; ?> >  &nbsp;<?php echo e(trans('labels.No')); ?>

                                    </label>
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.newsemailText')); ?></span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                           		<label for="shippingEnvironment" class="col-sm-2 col-md-3 control-label" style=""><?php echo e(trans('labels.newsnotification')); ?></label>
                                <div class="col-sm-10 col-md-4">
                                    <label class=" control-label">
                                          <input type="radio" name="news_notification" value="1" class="flat-red" <?php if($result['setting'][0]->news_notification==1): ?> checked <?php endif; ?> > &nbsp;<?php echo e(trans('labels.Yes')); ?>

                                    </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
                                    <label class=" control-label">
                                          <input type="radio" name="news_notification" value="0" class="flat-red" <?php if($result['setting'][0]->news_notification==0): ?> checked <?php endif; ?> >  &nbsp;<?php echo e(trans('labels.No')); ?>

                                    </label>
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.newsnotificationtext')); ?></span>
                                </div>
                            </div>  
                            
                              <!-- /.box-body -->
                            <div class="box-footer text-center">
                            	<button type="submit" class="btn btn-primary"><?php echo e(trans('labels.Update')); ?> </button>
                            	<a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>" type="button" class="btn btn-default"><?php echo e(trans('labels.back')); ?></a>
                            </div>
                              
                              <!-- /.box-footer -->
                            <?php echo Form::close(); ?>

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
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>