<div class="box-footer text-center">
<button id="add_{{$result['label']}}" type="submit" class="btn btn-primary">{{ trans('labels.'.$result['operation'].$result['label']) }}</button>
    <a href="{{ URL::to('admin/listing'.$result['label'])}}" type="button" class="btn btn-default">{{ trans('labels.back') }}</a>
</div>