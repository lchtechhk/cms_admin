<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Close') }}</button>
    @if ($result['operation'] == 'listing' || $result['operation'] == 'view_add' )
        <button type="submit" class="btn btn-primary"
            id="AddProductAttribute">{{ trans('labels.AddProductAttribute') }}
        </button>
        @else
        <button type="submit" class="btn btn-primary"
            id="Add">{{ trans('labels.Add') }}
        </button>
    @endif
</div>