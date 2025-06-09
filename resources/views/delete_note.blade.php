@vite(['resources/css/app.css'])
@include('components.navbar')

<div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
    <div class="bg-white p-6 rounded shadow-md max-w-md w-full text-center">
        <h2 class="text-2xl font-semibold text-red-600 mb-4">Are you sure?</h2>
        <p class="text-gray-700 mb-6">
            You are about to delete the note: <br>
            <strong class="text-black">"{{ $note->title }}"</strong>
        </p>

        <form method="POST" action="{{ route('notes.destroy', $note) }}">
            @csrf
            @method('DELETE')

            <div class="flex justify-center gap-4">
                <a href="{{ url('/') }}"
                   class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                    Cancel
                </a>

                <button type="submit"
                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                    Delete
                </button>
            </div>
        </form>
    </div>
</div>

