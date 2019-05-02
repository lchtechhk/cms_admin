<div class="modal fade" id="deleteAddressModal" tabindex="-1" role="dialog" aria-labelledby="deleteAddressModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="deleteAddressModalLabel">{{ trans('labels.DeleteAddress') }}</h4>
            </div>
            {!! Form::open(array('url' =>'admin/deleteAddress', 'name'=>'deleteAddress', 'id'=>'deleteAddress', 'method'=>'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data')) !!}
                {!! Form::text('customer_id',  '', array('class'=>'form-control', 'id'=>'customer_id')) !!}
                {!! Form::text('id',  '', array('class'=>'form-control', 'id'=>'id')) !!}
                <div class="modal-body">
                    <p>{{ trans('labels.DeleteAddressText') }}</p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('labels.Cancel') }}</button>
                        <button type="button" class="btn btn-primary" id="deleteAddressBtn">{{ trans('labels.Delete') }}</button>
                    </div>
                    @include('layouts/submit_back_button')
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>