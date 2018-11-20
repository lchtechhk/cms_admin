<?php $__env->startSection('content'); ?>
<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> <?php echo e(trans('labels.NewsCategories')); ?> <small><?php echo e(trans('labels.ListingNewsCategories')); ?>...</small> </h1>
    <ol class="breadcrumb">
       <li><a href="<?php echo e(URL::to('admin/dashboard/this_month')); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('labels.breadcrumb_dashboard')); ?></a></li>
      <li class="active"><?php echo e(trans('labels.NewsCategories')); ?></li>
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
            <h3 class="box-title"><?php echo e(trans('labels.ListingNewsCategories')); ?> </h3>
            <div class="box-tools pull-right">
            	<a href="addnewscategory" type="button" class="btn btn-block btn-primary"><?php echo e(trans('labels.AddNewsCategory')); ?></a>
            </div>
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th><?php echo e(trans('labels.ID')); ?></th>
                      <th><?php echo e(trans('labels.Name')); ?></th>
                      <th><?php echo e(trans('labels.Image')); ?></th>
                      <!--<th>Icon</th>-->
                      <th><?php echo e(trans('labels.AddedLastModifiedDate')); ?></th>
                      <th><?php echo e(trans('labels.Action')); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if(count($listingCategories)>0): ?>
                    <?php $__currentLoopData = $listingCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($categories->id); ?></td>
                            <td><?php echo e($categories->name); ?></td>
                            <td><img src="<?php echo e(asset('').'/'.$categories->image); ?>" alt="" width=" 100px"></td>
                           <!-- <td><img src="<?php echo e(asset('').'/'.$categories->icon); ?>" alt="" width=" 100px"></td>-->
                            <td><strong><?php echo e(trans('labels.AddedDate')); ?>: </strong> <?php echo e($categories->date_added); ?><br>
                            <strong><?php echo e(trans('labels.ModifiedDate')); ?>: </strong><?php echo e($categories->last_modified); ?>  </td>
                            <td><a data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('labels.Edit')); ?>" href="editnewscategory/<?php echo e($categories->id); ?>" class="badge bg-light-blue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
                           <!-- <a data-toggle="tooltip" data-placement="bottom" title="Delete <?php echo e($categories->name); ?> category" href="deleteNewsCategory/<?php echo e($categories->id); ?>" class="badge bg-red"><i class="fa fa-trash" aria-hidden="true"></i></a>-->
                           <a data-toggle="tooltip" data-placement="bottom" title="<?php echo e(trans('labels.Delete')); ?>" id="deleteNewsCategroyId" category_id ="<?php echo e($categories->id); ?>" class="badge bg-red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                           
                           </td>
                        </tr>
                        
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <?php else: ?>
                 <tr>
                 	<td colspan="5"> <?php echo e(trans('labels.NoRecordFound')); ?></td>
                 </tr>
                 <?php endif; ?>
                  </tbody>
                </table>
                <div class="col-xs-12 text-right">
                	<?php echo e($listingCategories->links('vendor.pagination.default')); ?>

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
    
    <div class="modal fade" id="deleteNewsCategoryModal" tabindex="-1" role="dialog" aria-labelledby="deleteNewsCategoryModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="deleteNewsCategoryModalLabel"><?php echo e(trans('labels.DeleteNewsCategory')); ?></h4>
		  </div>
		  <?php echo Form::open(array('url' =>'admin/deletenewscategory', 'name'=>'deleteNewsCategory', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')); ?>

				  <?php echo Form::hidden('action',  'delete', array('class'=>'form-control')); ?>

				  <?php echo Form::hidden('id',  '', array('class'=>'form-control', 'id'=>'id')); ?>

		  <div class="modal-body">						
			  <p><?php echo e(trans('labels.DeleteNewsCategoryText')); ?></p>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans('labels.Close')); ?></button>
			<button type="submit" class="btn btn-primary" id="deleteNewsCategory"><?php echo e(trans('labels.Delete')); ?></button>
		  </div>
		  <?php echo Form::close(); ?>

		</div>
	  </div>
	</div>
    
    <!-- /.row --> 
  </section>
  <!-- /.content --> 
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>