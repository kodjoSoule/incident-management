<?php

namespace App\Http\Controllers;

use App\Models\Incident;
use App\Services\IncidentService;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    protected $incidentService;

    public function __construct(IncidentService $incidentService)
    {
        $this->incidentService = $incidentService;
    }

    public function index()
    {
        return response()->json($this->incidentService->getAllIncidents(), 200);
    }

    public function store(Request $request)
    {
        return response()->json($this->incidentService->createIncident($request->all()), 201);
    }

    public function show($id)
    {
        return response()->json($this->incidentService->getIncidentById($id), 200);
    }

    public function update(Request $request, $id)
    {
        return response()->json($this->incidentService->updateIncident($id, $request->all()), 200);
    }

    public function destroy($id)
    {
        return response()->json($this->incidentService->deleteIncident($id), 204);
    }

    public function assign(Request $request, $id)
    {
        return response()->json($this->incidentService->assignIncident($id, $request->assigned_to), 200);
    }

    public function changeStatus(Request $request, $id)
    {
        return response()->json($this->incidentService->changeIncidentStatus($id, $request->status), 200);
    }
}
