@include('generic/view_function')
<section class="content-header">
    <h1>
      @if ($result['operation'] == 'add' || $result['operation'] == 'view_add' )
        {{ trans('labels.Add'.$result['label']) }}
        <small>{{ trans('labels.Add'.$result['label']) }}...</small>
      @elseif ($result['operation'] == 'edit' || $result['operation'] == 'view_edit')
        {{ trans('labels.Edit'.$result['label']) }}
        <small>{{ trans('labels.Edit'.$result['label']) }}...</small>
      @endif
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
      @if ($result['operation'] == 'add' || $result['operation'] == 'view_add' )
        <li class="active">{{ trans('labels.Add'.$result['label']) }}</li>
      @elseif ($result['operation'] == 'edit' || $result['operation'] == 'view_edit')
        <li class="active">{{ trans('labels.Edit'.$result['label']) }}</li>
      @endif
    </ol>
  </section>