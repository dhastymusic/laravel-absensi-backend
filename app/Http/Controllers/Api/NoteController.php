<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    //index
    public function index(Request $request)
    {
        $notes = Note::where('user_id', $request->user()->id)->get();
        return response()->json([
            'message' => 'Success',
            'data' => $notes
        ]);
    }

    //create
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $note = new Note();
        $note->user_id = $request->user()->id;
        $note->title = $request->title;
        $note->content = $request->content;
        $note->save();

        return response()->json([
            'message' => 'Note created',
            'data' => $note
        ],201);
    }


}
