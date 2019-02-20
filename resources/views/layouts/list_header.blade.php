<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="../resources/assets/js/main.js"></script>
<script src="../resources/assets/js/table-data.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				TableData.init();
			});
  </script>
<section class="content-header">
    <h1>
      {{ trans('labels.List'.$result['label']) }}
      <small>{{ trans('labels.List'.$result['label']) }}...</small>
    </h1>
    <ol class="breadcrumb">
      <li>
        <a href="{{ URL::to('admin/dashboard/this_month')}}">
          <i class="fa fa-dashboard"></i>
          {{ trans('labels.breadcrumb_dashboard') }}
        </a>
      </li>
      <li>
        <a href="listingCities">
          <i class="fa fa-dashboard"></i>{{ trans('labels.Listing'.$result['label']) }}</a>
      </li>
      <li class="active">{{ trans('labels.List'.$result['label']) }}</li>
    </ol>
  </section>
  