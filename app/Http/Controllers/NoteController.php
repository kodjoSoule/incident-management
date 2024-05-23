<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NoteService;


class NoteController extends Controller
{
    //
    protected $noteService;

    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }

    public function store(Request $request, $incidentId)
    {
        return response()->json($this->noteService->createNoteForIncident($incidentId, $request->all()), 201);
    }
}
