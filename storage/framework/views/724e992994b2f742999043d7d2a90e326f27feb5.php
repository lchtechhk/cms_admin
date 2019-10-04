<!DOCTYPE html>
<html>



<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>


<link rel="stylesheet" type="text/css" href=<?php echo e(App::make('url')->to('/')."/public/css/horizontal-scroll.css"); ?>>
<script src=<?php echo e(App::make('url')->to('/')."/resources/assets/js/table-data.js"); ?>></script>
<script src=<?php echo e(App::make('url')->to('/')."/resources/assets/js/objectUtils.js"); ?>></script>
<script src=<?php echo e(App::make('url')->to('/')."/resources/assets/js/filter.js"); ?>></script>

<!-- meta contains meta taga, css and fontawesome icons etc -->
<?php echo $__env->make('admin.common.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- ./end of meta -->

<body class=" hold-transition skin-blue sidebar-mini">
	<!-- wrapper -->
    <div class="wrapper">
    
   		<!-- header contains top navbar -->
        <?php echo $__env->make('admin.common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- ./end of header -->
        
        <!-- left sidebar -->
        <?php echo $__env->make('admin.common.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- ./end of left sidebar -->
        
        <!-- dynamic content -->
        <?php echo $__env->yieldContent('content'); ?>
        <!-- ./end of dynamic content -->
        
        <!-- right sidebar -->
        <?php echo $__env->make('admin.common.controlsidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- ./right sidebar -->
    	<?php echo $__env->make('admin.common.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
	<!-- ./wrapper -->

	<!-- all js scripts including custom js -->
	<?php echo $__env->make('admin.common.scripts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- ./end of js scripts -->
    
	</body>
</html>
