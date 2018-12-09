<?php $__env->startSection('content'); ?>
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><?php echo e(trans('labels.PaymentSetting')); ?> <small><?php echo e(trans('labels.PaymentSetting')); ?>...</small> </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('labels.breadcrumb_dashboard')); ?></a></li>
      <li class="active"><?php echo e(trans('labels.PaymentSetting')); ?></li>
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
            <h3 class="box-title"><?php echo e(trans('labels.PaymentSetting')); ?></h3>
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
              	  <div class="box box-info">
                        <!-- form start -->                        
                         <div class="box-body">
                            <?php echo Form::open(array('url' =>'admin/updatePaymentSetting', 'method'=>'post', 'class' => 'form-horizontal form-validate', 'enctype'=>'multipart/form-data')); ?>

                            
                            <div class="form-group">
                           		<label for="shippingEnvironment" class="col-sm-2 col-md-3 control-label" style=""><?php echo e(trans('labels.PaymentMetods')); ?></label>
                                <div class="col-sm-10 col-md-4">
                                    <label class=" control-label">
                                          <input type="checkbox" name="brantree_active" id="brantree_active" value="1" class="checkboxess" <?php if($result['shipping_methods'][0]->brantree_active==1): ?> checked <?php endif; ?> > &nbsp;<?php echo e(trans('labels.Brantree')); ?>

                                    </label><br>

                                    <label class=" control-label">
                                          <input type="checkbox" name="stripe_active" id="stripe_active" value="1" class="checkboxess" <?php if($result['shipping_methods'][0]->stripe_active==1): ?> checked <?php endif; ?> > &nbsp;<?php echo e(trans('labels.Stripe')); ?>

                                    </label><br>

                                    
                                    <label class=" control-label">
                                          <input type="checkbox" name="cash_on_delivery" id="cash_on_delivery" value="1" class="checkboxess " <?php if($result['shipping_methods'][0]->cash_on_delivery==1): ?> checked <?php endif; ?> > &nbsp;<?php echo e(trans('labels.CashOnDelivery')); ?>

                                    </label><br>

                                    
                                    <label class=" control-label">
                                          <input type="checkbox" name="paypal_status" id="paypal_status" value="1" class="checkboxess " <?php if($result['shipping_methods'][0]->paypal_status==1): ?> checked <?php endif; ?> > &nbsp;<?php echo e(trans('labels.paypal')); ?>

                                    </label><br>
                                                                        
                                <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.PaymentMetodsText')); ?></span>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                           		<label for="shippingEnvironment" class="col-sm-2 col-md-3 control-label" style=""><?php echo e(trans('labels.BraintreeAccountType')); ?></label>
                                <div class="col-sm-10 col-md-4">
                                    <label class=" control-label">
                                          <input type="radio" name="braintree_enviroment" value="0" class="flat-red" <?php if($result['shipping_methods'][0]->braintree_enviroment==0): ?> checked <?php endif; ?> > &nbsp;<?php echo e(trans('labels.Sanbox')); ?>

                                    </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
                                    <label class=" control-label">
                                          <input type="radio" name="braintree_enviroment" value="1" class="flat-red" <?php if($result['shipping_methods'][0]->braintree_enviroment==1): ?> checked <?php endif; ?> >  &nbsp;<?php echo e(trans('labels.Live')); ?>

                                    </label>
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.BraintreeAccountTypeText')); ?></span>
                                </div>
                            </div>
                            
                             <?php echo Form::hidden('braintree_name',  $result['shipping_methods'][0]->braintree_name , array('class'=>'form-control', 'id'=>'braintree_name')); ?>

                                <?php $__currentLoopData = $result['braintree_description']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $description_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-group">
                                      <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.braintreename')); ?> (<?php echo e($description_data['language_name']); ?>)</label>
                                      <div class="col-sm-10 col-md-4">
                                        <input type="text" name="briantree_name_<?=$description_data['languages_id']?>" class="form-control brantree_active <?php if($result["shipping_methods"][0]->brantree_active==1): ?> field-validate <?php endif; ?>" value="<?php echo e($description_data['name']); ?>">
                                      <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.braintreename')); ?> (<?php echo e($description_data['language_name']); ?>).</span>          
                                        <span class="help-block hidden"><?php echo e(trans('labels.textRequiredFieldMessage')); ?></span>
                                      </div>
                                    </div>
                                     <div class="form-group">
                                      <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.braintreeCard')); ?>-<?php echo e(trans('labels.Braintree')); ?> (<?php echo e($description_data['language_name']); ?>)</label>
                                      <div class="col-sm-10 col-md-4">
                                        <input type="text" name="sub_name_1_<?=$description_data['languages_id']?>" class="form-control brantree_active <?php if($result["shipping_methods"][0]->brantree_active==1): ?> field-validate <?php endif; ?>" value="<?php echo e($description_data['sub_name_1']); ?>">
                                      <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.braintreeCard')); ?>-<?php echo e(trans('labels.Braintree')); ?> (<?php echo e($description_data['language_name']); ?>).</span>          
                                        <span class="help-block hidden"><?php echo e(trans('labels.textRequiredFieldMessage')); ?></span>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.paypal')); ?>-<?php echo e(trans('labels.Braintree')); ?> (<?php echo e($description_data['language_name']); ?>)</label>
                                      <div class="col-sm-10 col-md-4">
                                        <input type="text" name="sub_name_2_<?=$description_data['languages_id']?>" class="form-control brantree_active <?php if($result["shipping_methods"][0]->brantree_active==1): ?> field-validate <?php endif; ?>" value="<?php echo e($description_data['sub_name_2']); ?>">
                                      <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.paypal')); ?>-<?php echo e(trans('labels.Braintree')); ?> (<?php echo e($description_data['language_name']); ?>).</span>          
                                        <span class="help-block hidden"><?php echo e(trans('labels.textRequiredFieldMessage')); ?></span>
                                      </div>
                                    </div>
                                     
                                 
                              	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             
							<div class="form-group">
								<label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.MerchantID')); ?></label>
								<div class="col-sm-10 col-md-4">
                                    <input type="text" name="braintree_merchant_id" id="braintree_merchant_id" value="<?php echo e($result['shipping_methods'][0]->braintree_merchant_id); ?>" class="form-control brantree_active <?php if($result["shipping_methods"][0]->brantree_active==1): ?> field-validate <?php endif; ?>">
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.MerchantIDText')); ?></span>
								</div>
							</div>						
							<div class="form-group">
								<label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.PublicKey')); ?></label>
								<div class="col-sm-10 col-md-4">
                                	<input type="text" name="braintree_public_key" id="braintree_public_key" value="<?php echo e($result['shipping_methods'][0]->braintree_public_key); ?>" class="form-control brantree_active <?php if($result["shipping_methods"][0]->brantree_active==1): ?> field-validate <?php endif; ?>">
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.PublicKeyText')); ?></span>
								</div>
							</div>	
                            <div class="form-group">
								<label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.PrivateKey')); ?></label>
								<div class="col-sm-10 col-md-4">
                                <input type="text" name="braintree_private_key" id="braintree_private_key" value="<?php echo e($result['shipping_methods'][0]->braintree_private_key); ?>" class="form-control brantree_active <?php if($result["shipping_methods"][0]->brantree_active==1): ?> field-validate <?php endif; ?>">
									<span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.PrivateKeyText')); ?></span>
								</div>
							</div>
                            <hr>
                            <div class="form-group">
                           		<label for="shippingEnvironment" class="col-sm-2 col-md-3 control-label" style=""><?php echo e(trans('labels.StripeEnviroment')); ?></label>
                                <div class="col-sm-10 col-md-4">
                                    <label class=" control-label">
                                          <input type="radio" name="stripe_enviroment" value="0" class="flat-red" <?php if($result['shipping_methods'][0]->stripe_enviroment==0): ?> checked <?php endif; ?> > &nbsp;<?php echo e(trans('labels.Sanbox')); ?>

                                    </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
                                    <label class=" control-label">
                                          <input type="radio" name="stripe_enviroment" value="1" class="flat-red" <?php if($result['shipping_methods'][0]->stripe_enviroment==1): ?> checked <?php endif; ?> >  &nbsp;<?php echo e(trans('labels.Live')); ?>

                                    </label>
                                    
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.StripeEnviromentText')); ?></span>
                                </div>
                            </div>
                            
                            <?php echo Form::hidden('stripe_name',  $result['shipping_methods'][0]->stripe_name , array('class'=>'form-control', 'id'=>'stripe_name')); ?>

                                <?php $__currentLoopData = $result['stripe_description']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $description_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-group">
                                      <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.StripeName')); ?> (<?php echo e($description_data['language_name']); ?>)</label>
                                      <div class="col-sm-10 col-md-4">
                                        <input type="text" name="stripe_name_<?=$description_data['languages_id']?>" class="form-control stripe_active <?php if($result["shipping_methods"][0]->stripe_active==1): ?> field-validate <?php endif; ?>" value="<?php echo e($description_data['name']); ?>">
                                      <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.StripeName')); ?> (<?php echo e($description_data['language_name']); ?>).</span>          
                                        <span class="help-block hidden"><?php echo e(trans('labels.textRequiredFieldMessage')); ?></span>
                                      </div>
                                    </div>
                                 
                              	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                         
                            <div class="form-group">
								<label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.SecretKey')); ?></label>
								<div class="col-sm-10 col-md-4">
									<input type="text" name="secret_key" id="secret_key" value="<?php echo e($result['shipping_methods'][0]->secret_key); ?>" class="form-control stripe_active <?php if($result["shipping_methods"][0]->stripe_active==1): ?> field-validate <?php endif; ?>">
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.SecretKeyText')); ?></span>
								</div>
							</div>	
													
							<div class="form-group">
								<label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.Key')); ?> </label>
								<div class="col-sm-10 col-md-4">
                               		 <input type="text" name="publishable_key" id="publishable_key" value="<?php echo e($result['shipping_methods'][0]->publishable_key); ?>" class="form-control stripe_active <?php if($result["shipping_methods"][0]->stripe_active==1): ?> field-validate <?php endif; ?>">
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.StripeKeyText')); ?></span>
								</div>
							</div>	
                           	
                           	<hr>
                           	
                           	<div class="form-group">
                           		<label for="shippingEnvironment" class="col-sm-2 col-md-3 control-label" style=""><?php echo e(trans('labels.paypalEnviroment')); ?></label>
                                <div class="col-sm-10 col-md-4">
                                    <label class=" control-label">
                                          <input type="radio" name="paypal_enviroment" value="0" class="flat-red" <?php if($result['shipping_methods'][0]->paypal_enviroment==0): ?> checked <?php endif; ?> > &nbsp;<?php echo e(trans('labels.Sanbox')); ?>

                                    </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
                                    <label class=" control-label">
                                          <input type="radio" name="paypal_enviroment" value="1" class="flat-red" <?php if($result['shipping_methods'][0]->paypal_enviroment==1): ?> checked <?php endif; ?> >  &nbsp;<?php echo e(trans('labels.Live')); ?>

                                    </label>
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.PaypalEnviromentText')); ?></span>
                                </div>
                            </div>
                             
                            <?php echo Form::hidden('paypal_name',  $result['shipping_methods'][0]->paypal_name , array('class'=>'form-control', 'id'=>'paypal_name')); ?>

                            <?php $__currentLoopData = $result['paypal_description']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $description_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.paypalName')); ?> (<?php echo e($description_data['language_name']); ?>)</label>
                                  <div class="col-sm-10 col-md-4">
                                    <input type="text" name="paypal_name_<?=$description_data['languages_id']?>" class="form-control paypal_status <?php if($result["shipping_methods"][0]->paypal_status==1): ?> field-validate <?php endif; ?>" value="<?php echo e($description_data['name']); ?>">
                                  <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.paypalName')); ?> (<?php echo e($description_data['language_name']); ?>).</span>          
                                    <span class="help-block hidden"><?php echo e(trans('labels.textRequiredFieldMessage')); ?></span>
                                  </div>
                                </div>                             
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             
                            
                            <div class="form-group">
								<label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.paypalId')); ?></label>
								<div class="col-sm-10 col-md-4">
                               		<input type="text" name="paypal_id" id="paypal_id" value="<?php echo e($result['shipping_methods'][0]->paypal_id); ?>" class="form-control paypal_status <?php if($result["shipping_methods"][0]->paypal_status==1): ?> field-validate <?php endif; ?>">
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.paypalIdText')); ?></span>
								</div>
							</div>	
                           	
                            <hr>
                           	
                           	
                           	<hr>
                            
                            <?php echo Form::hidden('cod_name',  $result['shipping_methods'][0]->cod_name , array('class'=>'form-control', 'id'=>'cod_name')); ?>

                            <?php $__currentLoopData = $result['cod_description']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $description_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-group">
                                  <label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.CashOnDeliveryName')); ?> (<?php echo e($description_data['language_name']); ?>)</label>
                                  <div class="col-sm-10 col-md-4">
                                    <input type="text" name="cod_name_<?=$description_data['languages_id']?>" class="form-control cash_on_delivery <?php if($result["shipping_methods"][0]->cash_on_delivery==1): ?> field-validate <?php endif; ?>" value="<?php echo e($description_data['name']); ?>">
                                  <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.CashOnDeliveryName')); ?> (<?php echo e($description_data['language_name']); ?>).</span>          
                                    <span class="help-block hidden"><?php echo e(trans('labels.textRequiredFieldMessage')); ?></span>
                                  </div>
                                </div>
                             
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           	
                            <hr>
                                                        
                            <div class="form-group">
								<label for="name" class="col-sm-2 col-md-3 control-label"><?php echo e(trans('labels.PaymentCurrency')); ?></label>
								<div class="col-sm-10 col-md-4">
                                	<input type="text" name="payment_currency" id="payment_currency" value="<?php echo e($result['shipping_methods'][0]->payment_currency); ?>" class="form-control field-validate">
                                    <span class="help-block" style="font-weight: normal;font-size: 11px;margin-bottom: 0;"><?php echo e(trans('labels.PaymentCurrencyText')); ?></span>
								</div>
							</div>	
                            
                            			
                            									
							<!-- /.box-body -->
							<div class="box-footer text-center">
								<button type="submit" class="btn btn-primary payment-checkbox"><?php echo e(trans('labels.Update')); ?> </button>
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