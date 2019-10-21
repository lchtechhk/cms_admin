{{-- @include('generic/order_function') --}}
<div class="modal fade" id="dialog_date_purchased" tabindex="-1" role="dialog" aria-labelledby="dialog_date_purchased">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" >{{ trans('labels.PurchaseDate') }}</h4>
            </div>

            {!! Form::open(array('id'=>'form_purchase_date','class' => 'form-horizontal form-validate')) !!}
                <div class="box-body">
                    <div class="form-group" id="group_date_purchased">
                        <label for="name" class="col-sm-2 col-md-3 control-label">{{ trans('labels.PurchasedDate') }}<span style="color:red">★</span></label> 
                        <div class="col-sm-10 col-md-4">
                            {!! Form::text('date_purchased', 
                            '',
                            array('class'=>'form-control datepicker field-validate','id'=>'date_purchased')) !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn btn-primary" id="addPurchaseDate">{{ trans('labels.Add') }}</div>
                </div>
                {!! Form::close() !!}
        </div>
    </div>
</div>