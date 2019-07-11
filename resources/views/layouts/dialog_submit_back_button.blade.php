<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Close') }}</button>
    @if ($result['operation'] == 'listing' || $result['operation'] == 'view_add' )
        <button type="submit" class="btn btn-primary"
            id="AddProductAttribute">{{ trans('labels.AddProductAttribute') }}
        </button>
        @elseif ($result['operation'] == 'view_edit')
        <button type="submit" class="btn btn-primary"
            id="EditProductAttribute">{{ trans('labels.EditProductAttribute') }}
        </button>
    @endif
</div>