<!DOCTYPE html>
<html>


{{-- jquery --}}
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript"></script>

{{-- validation  --}}
{{-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/additional-methods.js"></script> --}}


{{-- table-data --}}
<link rel="stylesheet" type="text/css" href={{App::make('url')->to('/')."/public/css/horizontal-scroll.css"}}>
<script src={{App::make('url')->to('/')."/resources/assets/js/table-data.js"}}></script>
<script src={{App::make('url')->to('/')."/resources/assets/js/objectUtils.js"}}></script>
<script src={{App::make('url')->to('/')."/resources/assets/js/filter.js"}}></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<!-- meta contains meta taga, css and fontawesome icons etc -->
@include('admin.common.meta')
<!-- ./end of meta -->

<body class=" hold-transition skin-blue sidebar-mini">
	<!-- wrapper -->
    <div class="wrapper">
    
   		<!-- header contains top navbar -->
        @include('admin.common.header')
        <!-- ./end of header -->
        
        <!-- left sidebar -->
        @include('admin.common.sidebar')
        <!-- ./end of left sidebar -->
        
        <!-- dynamic content -->
        @yield('content')
        <!-- ./end of dynamic content -->
        
        <!-- right sidebar -->
        @include('admin.common.controlsidebar')
        <!-- ./right sidebar -->
    	@include('admin.common.footer')
    </div>
	<!-- ./wrapper -->

	<!-- all js scripts including custom js -->
	@include('admin.common.scripts')
    <!-- ./end of js scripts -->
    
	</body>
</html>
