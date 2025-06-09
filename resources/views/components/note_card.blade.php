@vite(['resources/css/app.css'])

<div class="min-h-screen bg-gray-100 py-10 px-4">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-blue-600 text-center">Your Notes</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($notes as $note)
                <div class="bg-white rounded-xl shadow p-6 transition duration-300 hover:shadow-lg">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $note->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ $note->body }}</p>

                    <div class="text-sm text-gray-400 mb-4">
                        Created: {{ \Carbon\Carbon::parse($note->created_at)->diffForHumans() }}<br>
                        Updated: {{ \Carbon\Carbon::parse($note->updated_at)->diffForHumans() }}
                    </div>

                    <div class="flex justify-between items-center">
                        <a href="{{ route('notes.edit', $note->id) }}"
                           class="text-sm px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 transition">
                            ✏️ Edit
                        </a>

                        <a href="{{ route('notes.confirm-delete', $note->id) }}"
                           class="text-sm px-4 py-2 rounded bg-red-500 text-white hover:bg-red-600 transition">
                            🗑️ Delete
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
