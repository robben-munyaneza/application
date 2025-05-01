<?php

namespace App\Http\Controllers;

use App\Models\Applicants;
use Illuminate\Http\Request;

class ApplicantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Apps = Applicants::all();

        return view('pages.applicants.applicants', compact('Apps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      return view ('pages.applicants.applicants');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate ([
        'FirstName' => 'required|string|max:255',
        'LastName' => 'required|string|max:255',
        'Email' => 'required|string|',
        'ContactNumber' => 'required',
        'ApplicationDate' => 'required',
      ]);
       // create first letter for crud operation
       $App = new Applicants();
       $App->FirstName = $request->input('FirstName');
       $App->LastName = $request->input('LastName');
       $App->Email = $request->input('Email');
       $App->ContactNumber = $request->input('ContactNumber');
       $App->ApplicationDate = $request->input('ApplicationDate');
       $App->save();
        return redirect()->back()->with('success', 'applicant  Created Successfully!');


    }

    /**
     * Display the specified resource.
     */
    public function show(Applicants $applicants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    $App = Applicants::findOrFail($id);
    return view('pages.applicants.updateapplicants', compact('App'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    
        $request->validate ([
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'Email' => 'required|string|',
            'ContactNumber' => 'required',
            'ApplicationDate' => 'required',
          ]);
     $App = Applicants::findOrFail($id);
     
     $App->FirstName = $request->input('FirstName');
     $App->LastName = $request->input('LastName');
     $App->Email = $request->input('Email');
     $App->ContactNumber = $request->input('ContactNumber');
     $App->ApplicationDate = $request->input('ApplicationDate');
     $App->save();
     return redirect()->route('applicants.index')->with('success', 'Job Position Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

    $App = Applicants::findOrFail($id);

    $App -> delete();
    return redirect()->route('applicants.index')->with('success', 'applicants Deleted Successfully!');



    }
}
