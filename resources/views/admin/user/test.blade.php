@if ($result['operation'] == 'edit' || $result['operation'] == 'view_edit')
<div class="form-group">
    <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.Product_id') }}
        <span style="color:red">★</span>
    </label>
    <div class="col-sm-10 col-md-4">
        {!! Form::text('product_id', empty($result['product']->product_id) ? '' :
        print_value($result['operation'],$result['product']->product_id),
        array('class'=>'form-control', 'id'=>'product_id','readonly')) !!}
    </div>
</div>
@endif