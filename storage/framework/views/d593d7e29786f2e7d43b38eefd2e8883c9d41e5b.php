<?php $__env->startSection('content'); ?>
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> <?php echo e(trans('labels.apiSetting')); ?> <small><?php echo e(trans('labels.apiSetting')); ?>...</small> </h1>
    <ol class="breadcrumb">
       <li><a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('labels.breadcrumb_dashboard')); ?></a></li>
      <li class="active"><?php echo e(trans('labels.apiSetting')); ?></li>
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
            <h3 class="box-title"><?php echo e(trans('labels.apiSetting')); ?> </h3>
          </div>
          
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-xs-12">
              		<div class="box box-info">
                        <!-- form start -->                        
                         <div class="box-body">
                            <div class="alert alert-success" hidden id="generateSuccessfully" role="alert">
                                  <span class="icon fa fa-check" aria-hidden="true"></span>
                                  <span class="sr-only"><?php echo e(trans('labels.api')); ?>:</span>
                                  <?php echo e(trans('labels.updateapisettingmessage')); ?>

                            </div>
                        
                            <?php echo Form::open(array('url' =>'admin/updateSetting', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')); ?>

                            
                            <div class="form-group">
                              <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.consumerKey')); ?>

                              
                              </label>
                              <div class="col-sm-10 col-md-4">
                                <?php echo Form::text($result['settings'][68]->name, $result['settings'][68]->value, array('readonly'=>'readonly', 'class'=>'form-control', 'id'=>$result['settings'][68]->name)); ?>

                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;"><?php echo e(trans('labels.consumerKeyText')); ?></span>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.consumerSecret')); ?>

                              
                              </label>
                              <div class="col-sm-10 col-md-4">
                                <?php echo Form::text($result['settings'][69]->name, $result['settings'][69]->value, array('readonly'=>'readonly', 'class'=>'form-control', 'id'=>$result['settings'][69]->name)); ?>

                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;"><?php echo e(trans('labels.consumerSecretText')); ?></span>
                              </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-md-offset-3 col-sm-10 col-md-4">
                                    <button type="button" class="btn btn-success" id="generate-key"><?php echo e(trans('labels.generateKey')); ?> </button>
                                </div>
                            </div>                                                        
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