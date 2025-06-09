<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Auth::user()->notes;

        return view('notes',['notes'=>$notes]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_note'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoteRequest $request)
    {
        $validated_note = $request->validate([
            'title' => ['required', 'string', 'max:50', 'min:3'],
            'body' => ['required', 'string', 'max:500', 'min:10'],
        ]);

        $validated_note['user_id'] = Auth::id();

       
        Note::create($validated_note);

        return redirect()->route('notes.create')->with('note_created', true);
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        return view('note',['notes'=>$note]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        Gate::authorize('update', $note);
        return view('edit_note',['note'=>$note]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoteRequest $request, Note $note)
    {
        $validated = $request->validate([
        'title' => ['required', 'min:3', 'max:50'],
        'body' => ['required', 'min:10', 'max:500'],
        ]);

        $note->update($validated); 
        return redirect('/')->with('note_updated', true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
         $note->delete();

    return redirect('/')->with('note_deleted', true);
    }
    public function confirmDelete(Note $note)
    {
        Gate::authorize('delete', $note);
        return view('delete_note',['note'=>$note]); 
    }
}
