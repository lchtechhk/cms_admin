@include('generic/view_function')
<section class="content-header">
    <h1>
      {{ trans('labels.Add'.$result['label']) }}
      <small>{{ trans('labels.Add'.$result['label']) }}...</small>
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
          <i class="fa fa-dashboard"></i>{{ trans('labels.ListingAll'.$result['label']) }}</a>
      </li>
      <li class="active">{{ trans('labels.Add'.$result['label']) }}</li>
    </ol>
  </section>