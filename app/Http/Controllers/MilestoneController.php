<?php

namespace App\Http\Controllers;

use App\Models\Academician;
use App\Models\Milestone;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if(Gate::allows('view-milestone-admin')){

            $milestones = Milestone::all();
            return view('milestones.index', compact('milestones'));
        }
        else if(Gate::allows('view-milestone-academician')){
            // Get the projects that belong to the logged-in academician
            $projects = Project::where('academician_id', $user->academician->id)->get();
            // dd($projects);
            // Get the milestones for the projects assigned to the user
            $milestones = Milestone::whereIn('project_id', $projects->pluck('id'))->get();
            // dd($milestones);
            return view('milestones.index', compact('milestones'));
        }
        else{
            abort(403, 'Unauthorized action.');
        }       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($project_id)
    {   
        $user = Auth::user();

        if(Gate::allows('create-milestone')){
            $project = Project::findOrFail($project_id);
            return view('milestones.create',compact('project'));
        }
        else{
            abort(403, 'Unauthorized action.');
        }

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $project_id)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'target_complete_date' => 'required|date',
            'deliverable' => 'required|string|max:255',
        ]);

        // Create a new milestone
        $milestone = Milestone::create([
            'project_id' => $project_id, // Use the project_id passed via route
            'name' => $validated['name'],
            'target_complete_date' => $validated['target_complete_date'],
            'deliverable' => $validated['deliverable'],
            'status' => 'Pending', // Default status
            'remark' => null, // Default remark
            'date_updated' => null, // Initially null
        ]);

        // Redirect back with a success message
        return redirect()->route('milestones.index')
            ->with('success', 'Milestone created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Milestone $milestone)
    {
        return view('milestones.show',compact('milestone'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Milestone $milestone)
    {
        //$milestone = Milestone::findOrFail($milestone);
        return view('milestones.edit', compact('milestone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Milestone $milestone)
    {
        // dd($request->all());
        // $milestones = Milestone::findOrFail($milestone);
        
        $request->validate([
            'status' => 'required|string',
            'remark' => 'nullable|string',
        ]);

        $milestone->update([
            'status' => $request->status,
            'remark' => $request->remark,
        ]);

        return redirect()->route('milestones.index')->with('success', 'Milestone updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Milestone $milestone)
    {
        $milestone->delete();

        return redirect()->route('milestones.index')->with('success', 'Milestone deleted successfully!');
    }
}
