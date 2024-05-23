<?php

namespace App\Services;

use App\Models\Incident;

class IncidentService
{
    public function getAllIncidents()
    {
        return Incident::all();
    }

    public function createIncident($data)
    {
        return Incident::create($data);
    }

    public function getIncidentById($id)
    {
        return Incident::findOrFail($id);
    }

    public function updateIncident($id, $data)
    {
        $incident = Incident::findOrFail($id);
        $incident->update($data);
        return $incident;
    }

    public function deleteIncident($id)
    {
        $incident = Incident::findOrFail($id);
        $incident->delete();
    }

    public function assignIncident($id, $assignedTo)
    {
        $incident = Incident::findOrFail($id);
        $incident->assigned_to = $assignedTo;
        $incident->save();
        return $incident;
    }

    public function changeIncidentStatus($id, $status)
    {
        $incident = Incident::findOrFail($id);
        $incident->status = $status;
        $incident->save();
        return $incident;
    }
}
