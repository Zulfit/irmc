<?php

namespace App\Http\Controllers;

use App\Models\Academician;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if(Gate::allows('view-projects-irmc')) { //admin & staff
            $projects = Project::with(['leader', 'members'])->get();

            return view('projects.index',compact('projects'));
        }
        else if(Gate::allows('view-projects-leader')){

            // Get projects where the logged-in academician is the leader
            // dd($user);
            $projects = Project::where('academician_id', $user->id)->get();

            return view('projects.index', compact('projects'));
        }
        else{
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Gate::allows('create-project')) {
            $academicians = Academician::with('user')->get(); 
            return view('projects.create',compact('academicians'));
        }
        else{
            abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request data
        $validated = $request->validate([
            'leader_id' => 'required|exists:academicians,id',
            'title' => 'required|string|max:255',
            'grantProvider' => 'required|string|max:255',
            'grantAmount' => 'required|numeric|min:0',
            'startDate' => 'required|date',
            'duration' => 'required|integer|min:1',
            'members' => 'required|array',
            'members.*' => 'exists:academicians,id',
        ]);

        // Create the project
        $project = Project::create([
            'academician_id' => $validated['leader_id'], // Leader ID
            'title' => $validated['title'],
            'grantProvider' => $validated['grantProvider'],
            'grantAmount' => $validated['grantAmount'],
            'startDate' => $validated['startDate'],
            'duration' => $validated['duration'],
        ]);

        // Attach members to the project
        $project->members()->attach($validated['members']);
        
        // Redirect with success message
        return redirect()->route('projects.index')->with('success', 'Project created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project->load('members', 'leader');
        $academicians = Academician::with('user')->get(); // Fetch all academicians (if needed for display)
        
        return view('projects.show', compact('project', 'academicians'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $academicians = Academician::with('user')->get();
        return view('projects.edit',compact('project','academicians'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        // dd($request->all());
        // dd('reached controller');
        // Validate the incoming data
        // $request->validate([
        //     'leader_id' => 'exists:academicians,id',
        //     'title' => 'required|string|max:255',
        //     'grantProvider' => 'required|string|max:255',
        //     'grantAmount' => 'required|numeric|min:0',
        //     'startDate' => 'required|date',
        //     'duration' => 'required|integer|min:1',
        //     'members' => 'array', // members can be optional
        //     'members.*' => 'exists:academicians,id', // Validate each member ID
        // ]);

        // dd('test');

        // Update the project attributes
        $project->academician_id = $request->leader_id;
        $project->title = $request->title;
        $project->grantProvider = $request->grantProvider;
        $project->grantAmount = $request->grantAmount;
        $project->startDate = $request->startDate;
        $project->duration = $request->duration;

        // Save the updated project
        $project->save();

        // Sync project members
        if ($request->has('members')) {
            $project->members()->sync($request->members);
        } else {
            $project->members()->detach(); // Remove all members if none selected
        }
        
        // return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
        return redirect(route('projects.index'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully!');
    }
}
