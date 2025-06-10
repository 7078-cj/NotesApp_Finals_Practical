@vite(['resources/css/app.css'])
@include('components.navbar')   
<div>
   @include('components.note_card')
</div>
@if(session('note_deleted'))
<div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
    <div class="bg-white p-6 rounded shadow-md text-center">
        <h3 class="text-lg font-semibold mb-2">Deleted!</h3>
        <p class="mb-4">The note was deleted successfully.</p>
        <button onclick="this.parentElement.parentElement.style.display='none'"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Close
        </button>
    </div>
</div>
@endif

@if(session('note_updated'))
<div
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
    id="success-modal"
>
    <div class="bg-white rounded-lg p-6 max-w-sm text-center shadow-lg">
        <h3 class="text-lg font-semibold mb-4">Success!</h3>
        <p class="mb-6">Your note has been updated successfully.</p>
        <a href="/">
            <button
                onclick="document.getElementById('success-modal').style.display='none'"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded"
            >
                Close
            </button>
        </a>
    </div>
</div>
@endif

