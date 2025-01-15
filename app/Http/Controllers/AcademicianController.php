<?php

namespace App\Http\Controllers;

use App\Models\Academician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AcademicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ensure the user has the 'create-project' permission
        Gate::authorize('academician-list');

        // Fetch all academicians if authorized
        $academicians = Academician::with('user')->get();

        return view('academicians.index', compact('academicians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Gate::allows('create-project')) {
            
            return view('academicians.create');
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
            'name' => 'required|string|max:255',
            'staffNum' => 'required|string|max:255',
            'email' => 'required|email',
            'college' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'position' => 'required',
        ]);

        // Create the academician
        $academician = Academician::create([
            'name' => $validated['name'], 
            'staffNum' => $validated['staffNum'],
            'email' => $validated['email'],
            'college' => $validated['college'],
            'department' => $validated['department'],
            'position' => $validated['position'],
        ]);
        
        // Redirect with success message
        return redirect()->route('academicians.index')->with('success', 'Academician created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Academician $academician)
    {
        return view('academicians.show', compact('academician'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Academician $academician)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Academician $academician)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Academician $academician)
    {
        //
    }
}
