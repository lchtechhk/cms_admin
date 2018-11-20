
<?php $__env->startSection('content'); ?>
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> <?php echo e(trans('labels.application_settings')); ?> <small><?php echo e(trans('labels.application_settings')); ?>...</small> </h1>
    <ol class="breadcrumb">
       <li><a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('labels.breadcrumb_dashboard')); ?></a></li>
      <li class="active"><?php echo e(trans('labels.application_settings')); ?></li>
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
            <h3 class="box-title"><?php echo e(trans('labels.application_settings')); ?> </h3>
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
                                      <span class="sr-only"><?php echo e(trans('labels.Setting')); ?>:</span>
                                      <?php echo e($error); ?>

                                </div>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                        
                            <?php echo Form::open(array('url' =>'admin/updateSetting', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')); ?>

                            <h4><?php echo e(trans('labels.generalSetting')); ?> </h4>
                            <hr>
                            
                            <div class="form-group">
                              <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.homeStyle')); ?>

                              
                              </label>
                              <div class="col-sm-10 col-md-4">
                              <select name="<?php echo e($result['settings'][28]->name); ?>" class="form-control">
                              	<option <?php if($result['settings'][28]->value == '1'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="1"> <?php echo e(trans('labels.Style1')); ?></option>
                                <option <?php if($result['settings'][28]->value == '2'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="2"> <?php echo e(trans('labels.Style2')); ?></option>
                              	<option <?php if($result['settings'][28]->value == '3'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="3"> <?php echo e(trans('labels.Style3')); ?></option>
                                <option <?php if($result['settings'][28]->value == '4'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="4"> <?php echo e(trans('labels.Style4')); ?></option>
                              	<option <?php if($result['settings'][28]->value == '5'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="5"> <?php echo e(trans('labels.Style5')); ?></option>                                   
                                         
                               </select>
                                
                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;"><?php echo e(trans('labels.homeStyleText')); ?></span>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.categoryStyle')); ?></label>
                              <div class="col-sm-10 col-md-4">
                              <select name="<?php echo e($result['settings'][45]->name); ?>" class="form-control">
                              	<option <?php if($result['settings'][45]->value == '1'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="1"> <?php echo e(trans('labels.categories1')); ?></option>
                                <option <?php if($result['settings'][45]->value == '2'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="2"> <?php echo e(trans('labels.categories2')); ?></option>
                              	<option <?php if($result['settings'][45]->value == '3'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="3"> <?php echo e(trans('labels.categories3')); ?></option>
                                <option <?php if($result['settings'][45]->value == '4'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="4"> <?php echo e(trans('labels.categories4')); ?></option>
                              	<option <?php if($result['settings'][45]->value == '5'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="5"> <?php echo e(trans('labels.categories5')); ?></option>  
                              	<option <?php if($result['settings'][45]->value == '6'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="6"> <?php echo e(trans('labels.categories6')); ?></option>                                   
                                         
                               </select>
                                
                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;"><?php echo e(trans('labels.categoryStyleText')); ?></span>
                              </div>
                            </div>
                            
                            <div class="form-group android-hide">
                              <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.DisplayFooterMenu')); ?></label>
                              <div class="col-sm-10 col-md-4">
                              <select name="<?php echo e($result['settings'][24]->name); ?>" class="form-control">
                              	<option <?php if($result['settings'][24]->value == '1'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="1"> <?php echo e(trans('labels.Show')); ?></option>
                              	<option <?php if($result['settings'][24]->value == '0'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="0"> <?php echo e(trans('labels.Hide')); ?></option>                                         
                               </select>                                
                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;"><?php echo e(trans('labels.DisplayFooterMenuText')); ?></span>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.DisplayCartButton')); ?>

                              
                              </label>
                              <div class="col-sm-10 col-md-4">
                              <select name="<?php echo e($result['settings'][25]->name); ?>" class="form-control">
                              	<option <?php if($result['settings'][25]->value == '1'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="1"> <?php echo e(trans('labels.Show')); ?></option>
                              	<option <?php if($result['settings'][25]->value == '0'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="0"> <?php echo e(trans('labels.Hide')); ?></option>
                                         
                               </select>
                                
                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;"><?php echo e(trans('labels.DisplayCartButtonText')); ?></span>
                              </div>
                            </div>
                            
                            <div class="form-group android-hide">
                              <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.packageName')); ?>

                              
                              </label>
                              <div class="col-sm-10 col-md-4">
                                <?php echo Form::text($result['settings'][46]->name,  $result['settings'][46]->value, array('class'=>'form-control', 'id'=>$result['settings'][46]->name)); ?>

                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;"><?php echo e(trans('labels.packageNameText')); ?></span>
                              </div>
                            </div>
                            
                            <div class="form-group android-hide"  style="display: none">
                              <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.googleAnalyticId')); ?>

                              
                              </label>
                              <div class="col-sm-10 col-md-4">
                                <?php echo Form::text($result['settings'][47]->name,  $result['settings'][47]->value, array('class'=>'form-control', 'id'=>$result['settings'][47]->name)); ?>

                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;"><?php echo e(trans('labels.googleAnalyticIdText')); ?></span>
                              </div>
                            </div>
                            
                            <div class="form-group android-hide" style="display: none">
                              <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.LazzyLoadingEffect')); ?>

                              
                              </label>
                              <div class="col-sm-10 col-md-4">
                               
                                <select name="<?php echo e($result['settings'][23]->name); ?>" class="form-control">
                                    	<option 
                                        	<?php if($result['settings'][23]->value == 'android'): ?>
                                            	selected
                                            <?php endif; ?>
                                         value="android"> <?php echo e(trans('labels.Android')); ?></option>
                                         <option 
                                        	<?php if($result['settings'][23]->value == 'ios-small'): ?>
                                            	selected
                                            <?php endif; ?>
                                         value="ios-small"> <?php echo e(trans('labels.IOSSmall')); ?></option>
                                         <option 
                                        	<?php if($result['settings'][23]->value == 'bubbles'): ?>
                                            	selected
                                            <?php endif; ?>
                                         value="bubbles"> <?php echo e(trans('labels.Bubbles')); ?></option>
                                         <option 
                                        	<?php if($result['settings'][23]->value == 'circles'): ?>
                                            	selected
                                            <?php endif; ?>
                                         value="circles"> <?php echo e(trans('labels.Circles')); ?></option>
                                         <option 
                                        	<?php if($result['settings'][23]->value == 'crescent'): ?>
                                            	selected
                                            <?php endif; ?>
                                         value="crescent"> <?php echo e(trans('labels.Crescent')); ?></option>
                                         <option 
                                        	<?php if($result['settings'][23]->value == 'dots'): ?>
                                            	selected
                                            <?php endif; ?>
                                         value="dots"> <?php echo e(trans('labels.Dots')); ?></option>
                                         <option 
                                        	<?php if($result['settings'][23]->value == 'lines'): ?>
                                            	selected
                                            <?php endif; ?>
                                         value="lines"> <?php echo e(trans('labels.Lines')); ?></option>
                                         <option 
                                        	<?php if($result['settings'][23]->value == 'ripple'): ?>
                                            	selected
                                            <?php endif; ?>
                                         value="ripple"> <?php echo e(trans('labels.Ripple')); ?></option>
                                         <option 
                                        	<?php if($result['settings'][23]->value == 'spiral'): ?>
                                            	selected
                                            <?php endif; ?>
                                         value="spiral"> <?php echo e(trans('labels.Spiral')); ?></option>
                                         
                                 </select>
                                    
                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;"><?php echo e(trans('labels.LazzyLoadingEffectText')); ?></span>
                              </div>
                            </div>
                                                        
                            <hr>
                            <h4><?php echo e(trans('labels.displayPages')); ?> </h4>
                            <hr>
                            
                            <div class="form-group">
                              <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.wishListPage')); ?>

                              
                              </label>
                              <div class="col-sm-10 col-md-4">
                              <select name="<?php echo e($result['settings'][29]->name); ?>" class="form-control">
                              	<option <?php if($result['settings'][29]->value == '1'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="1"> <?php echo e(trans('labels.Show')); ?></option>
                              	<option <?php if($result['settings'][29]->value == '0'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="0"> <?php echo e(trans('labels.Hide')); ?></option>
                                         
                               </select>
                                
                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;"><?php echo e(trans('labels.wishListPageText')); ?></span>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.editProfilePage')); ?>

                              
                              </label>
                              <div class="col-sm-10 col-md-4">
                              <select name="<?php echo e($result['settings'][30]->name); ?>" class="form-control">
                              	<option <?php if($result['settings'][30]->value == '1'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="1"> <?php echo e(trans('labels.Show')); ?></option>
                              	<option <?php if($result['settings'][30]->value == '0'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="0"> <?php echo e(trans('labels.Hide')); ?></option>
                                         
                               </select>
                                
                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;"><?php echo e(trans('labels.editProfilePageText')); ?></span>
                              </div>
                            </div>
                            
                            
                            <div class="form-group">
                              <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.shippingAddressPage')); ?>

                              
                              </label>
                              <div class="col-sm-10 col-md-4">
                              <select name="<?php echo e($result['settings'][31]->name); ?>" class="form-control">
                              	<option <?php if($result['settings'][31]->value == '1'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="1"> <?php echo e(trans('labels.Show')); ?></option>
                              	<option <?php if($result['settings'][31]->value == '0'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="0"> <?php echo e(trans('labels.Hide')); ?></option>
                                         
                               </select>
                                
                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;"><?php echo e(trans('labels.shippingAddressPageText')); ?></span>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.myOrdersPage')); ?>

                              
                              </label>
                              <div class="col-sm-10 col-md-4">
                              <select name="<?php echo e($result['settings'][32]->name); ?>" class="form-control">
                              	<option <?php if($result['settings'][32]->value == '1'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="1"> <?php echo e(trans('labels.Show')); ?></option>
                              	<option <?php if($result['settings'][32]->value == '0'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="0"> <?php echo e(trans('labels.Hide')); ?></option>
                                         
                               </select>
                                
                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;"><?php echo e(trans('labels.myOrdersPageText')); ?></span>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.contactUsPage')); ?>

                              
                              </label>
                              <div class="col-sm-10 col-md-4">
                              <select name="<?php echo e($result['settings'][33]->name); ?>" class="form-control">
                              	<option <?php if($result['settings'][33]->value == '1'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="1"> <?php echo e(trans('labels.Show')); ?></option>
                              	<option <?php if($result['settings'][33]->value == '0'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="0"> <?php echo e(trans('labels.Hide')); ?></option>
                                         
                               </select>
                                
                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;"><?php echo e(trans('labels.contactUsPageText')); ?></span>
                              </div>
                            </div>
                            
                            
                            <div class="form-group">
                              <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.aboutUsPage')); ?>

                              
                              </label>
                              <div class="col-sm-10 col-md-4">
                              <select name="<?php echo e($result['settings'][34]->name); ?>" class="form-control">
                              	<option <?php if($result['settings'][34]->value == '1'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="1"> <?php echo e(trans('labels.Show')); ?></option>
                              	<option <?php if($result['settings'][34]->value == '0'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="0"> <?php echo e(trans('labels.Hide')); ?></option>
                                         
                               </select>
                                
                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;"><?php echo e(trans('labels.aboutUsPageText')); ?></span>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.newsPage')); ?>

                              
                              </label>
                              <div class="col-sm-10 col-md-4">
                              <select name="<?php echo e($result['settings'][35]->name); ?>" class="form-control">
                              	<option <?php if($result['settings'][35]->value == '1'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="1"> <?php echo e(trans('labels.Show')); ?></option>
                              	<option <?php if($result['settings'][35]->value == '0'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="0"> <?php echo e(trans('labels.Hide')); ?></option>
                                         
                               </select>
                                
                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;"><?php echo e(trans('labels.newsPageText')); ?></span>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.introPage')); ?>

                              
                              </label>
                              <div class="col-sm-10 col-md-4">
                              <select name="<?php echo e($result['settings'][36]->name); ?>" class="form-control">
                              	<option <?php if($result['settings'][36]->value == '1'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="1"> <?php echo e(trans('labels.Show')); ?></option>
                              	<option <?php if($result['settings'][36]->value == '0'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="0"> <?php echo e(trans('labels.Hide')); ?></option>
                                         
                               </select>
                                
                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;"><?php echo e(trans('labels.introPageText')); ?></span>
                              </div>
                            </div>
                            
                            
                            <div class="form-group">
                              <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.shareapp')); ?>

                              
                              </label>
                              <div class="col-sm-10 col-md-4">
                              <select name="<?php echo e($result['settings'][38]->name); ?>" class="form-control">
                              	<option <?php if($result['settings'][38]->value == '1'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="1"> <?php echo e(trans('labels.Show')); ?></option>
                              	<option <?php if($result['settings'][38]->value == '0'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="0"> <?php echo e(trans('labels.Hide')); ?></option>
                                         
                               </select>                                
                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;"><?php echo e(trans('labels.shareappText')); ?></span>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.rateapp')); ?></label>
                              <div class="col-sm-10 col-md-4">
                              <select name="<?php echo e($result['settings'][39]->name); ?>" class="form-control">
                              	<option <?php if($result['settings'][39]->value == '1'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="1"> <?php echo e(trans('labels.Show')); ?></option>
                              	<option <?php if($result['settings'][39]->value == '0'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="0"> <?php echo e(trans('labels.Hide')); ?></option>
                                         
                               </select>                                
                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;"><?php echo e(trans('labels.rateappText')); ?></span>
                              </div>
                            </div>
                            
                            
                            <div class="form-group">
                              <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.settingPage')); ?>

                              
                              </label>
                              <div class="col-sm-10 col-md-4">
                              <select name="<?php echo e($result['settings'][38]->name); ?>" class="form-control">
                              	<option <?php if($result['settings'][38]->value == '1'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="1"> <?php echo e(trans('labels.Show')); ?></option>
                              	<option <?php if($result['settings'][38]->value == '0'): ?>
                                        selected
                                    <?php endif; ?>
                                 value="0"> <?php echo e(trans('labels.Hide')); ?></option>
                                         
                               </select>
                                
                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;"><?php echo e(trans('labels.settingPageText')); ?></span>
                              </div>
                            </div>
                            
                            <hr>
                            <h4><?php echo e(trans('labels.LocalNotification')); ?> </h4>
                            <hr>
                            
                            
                            <div class="form-group">
                              <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.Title')); ?>

                              
                              </label>
                              <div class="col-sm-10 col-md-4">
                                <?php echo Form::text($result['settings'][21]->name, $result['settings'][21]->value, array('class'=>'form-control', 'id'=>$result['settings'][21]->name)); ?>

                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;"><?php echo e(trans('labels.NotificationTitleText')); ?></span>
                              </div>
                            </div>
                            
                            
                            <div class="form-group">
                              <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.Detail')); ?>

                              
                              </label>
                              <div class="col-sm-10 col-md-4">
                                <?php echo Form::text($result['settings'][23]->name, $result['settings'][23]->value, array('class'=>'form-control', 'id'=>$result['settings'][23]->name)); ?>

                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;margin-top: 0;"><?php echo e(trans('labels.NotificationDetailtext')); ?></span>
                              </div>
                            </div>
                            
                            <div class="form-group">
                            	<label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.NotificationDuration')); ?></label>
                                <div class="col-sm-10 col-md-4">
                                                                    
                                    <select class="form-control" name="<?php echo e($result['settings'][27]->name); ?>">
                                          <option value="day" <?php if($result['settings'][27]->value=='day'): ?> selected <?php endif; ?>><?php echo e(trans('labels.Day')); ?></option>
                                          <option value="month" <?php if($result['settings'][27]->value=='month'): ?> selected <?php endif; ?>><?php echo e(trans('labels.Month')); ?></option>
                                          <option value="year" <?php if($result['settings'][27]->value=='year'): ?> selected <?php endif; ?>><?php echo e(trans('labels.Year')); ?></option>
                                    </select>
                                    
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.NotificationDurationText')); ?></span>
                                  </div>
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