<?php

namespace App\Http\Controllers;

use App\Models\JobPosition;
use Illuminate\Http\Request;

class JobPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $jobs = JobPosition::all();   
    return view ('pages.jobposition.jobposition', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.jobposition.jobposition');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validation

        $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'description' => 'required|string',
            'qualifications' => 'required|string',
        ]);

        // create first letter for crud operation
        $job = new JobPosition();
        $job->Title = $request->input('title');
        $job->Department = $request->input('department');
        $job->Description = $request->input('description');
        $job->RequiredQualifications = $request->input('qualifications');
        $job->save();
         return redirect()->back()->with('success', 'Job Position Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobPosition $jobPosition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $job = JobPosition::findOrFail($id);
       return view('pages.jobposition.updatejobposition', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'description' => 'required|string',
            'qualifications' => 'required|string',
        ]);
    
        $job = JobPosition::findOrFail($id);
        $job->Title = $request->input('title');
        $job->Department = $request->input('department');
        $job->Description = $request->input('description');
        $job->RequiredQualifications = $request->input('qualifications');
        $job->save();
    
        return redirect()->route('jobposition.index')->with('success', 'Job Position Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)

    {
     $job = jobposition::findOrFail($id);
     $job->delete();
      return redirect()->route('jobposition.index')->with('success', 'Job Position Deleted Successfully!');
    }
}
