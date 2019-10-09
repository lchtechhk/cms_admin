<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Close') }}</button>
    @if ($result['operation'] == 'listing' || $result['operation'] == 'view_add' )
        <button type="submit" class="btn btn-primary"
            id="add">{{ trans('labels.Add') }}
        </button>
        @else
        <button type="submit" class="btn btn-primary"
            id="edit">{{ trans('labels.Edit') }}
        </button>
    @endif
</div>