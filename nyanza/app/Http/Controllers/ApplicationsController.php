<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use App\Models\JobPosition;
use App\Models\Applicants;
use Illuminate\Http\Request;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $applications = Applications::all();   
    $applicants = Applicants::all();
    $jobpositions = JobPosition::all();
     return view('pages.application.application', compact('applicants','jobpositions', 'applications'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    return view('pages.application.application');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'job_id' => 'required|exists:job_positions,id',
            'ApplicationStatus' => 'required|string|max:255',
            'ReviewDate' => 'nullable|date',
        ]);

          // Create and save the application
          Applications::create($request->all());

    return redirect()->back()->with('success', 'Application submitted successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Applications $applications)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $applications = Applications::findOrFail($id);
        $applicants = Applicants::all();
        $jobpositions = JobPosition::all();
    
        return view('pages.application.updateapplication', compact('applications', 'applicants', 'jobpositions'));
    }
    
 
 

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'applicant_id' => 'required|exists:applicants,id',
            'job_id' => 'required|exists:job_positions,id',
            'ApplicationStatus' => 'required|string|max:255',
            'ReviewDate' => 'nullable|date',
        ]);
    
        $application = Applications::findOrFail($id);
        $application->update($validated);
    
        return redirect()->route('applications.index')->with('success', 'Application updated successfully.');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $applications = Applications::findOrFail($id);
        $applicants = Applicants::all();
        $jobpositions = JobPosition::all();
        $applications->delete();

        return redirect()->route('applications.index')->with('success', 'application Deleted Successfully!');
    }
}
