
<div class="alert alert-{{$type == 'success' ? 'success' : 'danger'}} alert-dismissible fade show position-absolute bottom-3 end-2  mx-3 my-3" style="z-index: 20" role="alert">
    <span class="alert-icon"><i class="fa-solid {{$type == 'success' ? 'fa-thumbs-up' : 'fa-circle-exclamation'}}"></i></span>
    <span class="alert-text"><strong>{{ $type == 'success' ? 'Success' : 'Error' }} </strong>
        {{ $message }}
    </span>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>