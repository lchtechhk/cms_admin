@if(!empty($result['status']) && $result['status'] == 'success')
    <div class="alert alert-success alert-dismissible" role="alert">
        @if(empty($result['message']))
            Update Successful
        </div>
        @endif
@elseif (!empty($result['status']) && $result['status'] == 'fail')
    <div class="alert alert-danger alert-dismissible" role="alert">
@endif
    
@if(!empty($result['message']))
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{ $result['message'] }}
    </div>
@endif
