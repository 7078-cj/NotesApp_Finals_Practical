<nav class="bg-white shadow-md px-6 py-4 flex items-center justify-between">
    <!-- Left: Note Logo + User Name -->
    <div class="flex items-center space-x-3 text-gray-700 font-semibold">
        <a href="{{ url('/') }}" class="flex items-center hover:text-blue-600 transition">
            <!-- Note SVG Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h5l5 5v9a2 2 0 01-2 2z" />
            </svg>
            <span class="ml-2">NotesApp</span>
        </a>
        <span>Welcome, {{ auth()->user()->name }}</span>
    </div>

    <!-- Right: Buttons -->
    <div class="flex items-center space-x-4">
        <!-- Create Note Button -->
        <a href="{{ route('notes.create') }}"
           class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition duration-200">
            Create Note
        </a>

        <!-- Logout Button -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded transition duration-200">
                Logout
            </button>
        </form>
    </div>
</nav>
