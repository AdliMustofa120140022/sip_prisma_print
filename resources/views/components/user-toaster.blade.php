<div class="fixed bottom-20 right-2 mx-3 my-3 z-20">
    <div class="alert relative flex items-center p-4 rounded border-l-4 shadow-lg bg-green-400
        {{ $type == 'success' ? 'bg-green-100 border-green-500 text-green-700' : 'bg-red-100 border-red-500 text-red-700' }}"
        role="alert">
        <span class="alert-icon mr-3">
            <i class="fa-solid {{ $type == 'success' ? 'fa-thumbs-up' : 'fa-circle-exclamation' }}"></i>
        </span>
        <span class="alert-text flex-grow">
            <strong>{{ $type == 'success' ? 'Success' : 'Error' }} </strong> {{ $message }}
        </span>
        <button type="button" class="btn-close ml-4 text-black" onclick="this.parentElement.style.display='none'">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
