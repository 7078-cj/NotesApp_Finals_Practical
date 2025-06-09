@vite(['resources/css/app.css'])
@include('components.navbar') 

<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="w-full max-w-lg bg-white p-6 rounded shadow-md">

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>⚠️ {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('notes.update', $note->id) }}">
            @csrf
            @method('PUT')

            <h2 class="text-2xl font-semibold mb-6 text-center">Edit Note</h2>

            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium mb-1">Title</label>
                <input type="text" name="title" id="title"
                    class="w-full border rounded-md px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400
                    @error('title') border-red-500 @enderror"
                    value="{{ old('title', $note->title) }}" placeholder="Note title (3-50 chars)">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="body" class="block text-gray-700 font-medium mb-1">Body</label>
                <textarea name="body" id="body" rows="5"
                    class="w-full border rounded-md px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400
                    @error('body') border-red-500 @enderror"
                    placeholder="Write your note here (10-500 chars)">{{ old('body', $note->body) }}</textarea>
                @error('body')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded transition duration-200">
                Update Note
            </button>
        </form>

    </div>
</div>

<!-- Modal -->
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

