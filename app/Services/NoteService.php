<?php

namespace App\Services;

use App\Models\Note;

class NoteService
{
    public function createNoteForIncident($incidentId, $data)
    {
        $data['incident_id'] = $incidentId;
        return Note::create($data);
    }
}
