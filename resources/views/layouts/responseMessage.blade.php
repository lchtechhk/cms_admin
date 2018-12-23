@if(!empty($result['status']) && $result['status'] == 'success')
    <div class="alert alert-success alert-dismissible" role="alert">
@elseif (!empty($result['status']) && $result['status'] == 'fail')
    <div class="alert alert-danger alert-dismissible" role="alert">
@endif
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        @if(!empty($result['message']))
            {{ $result['message'] }}
        @endif
    </div>