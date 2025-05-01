<?php

namespace App\Http\Controllers;

use App\Models\RecruitmentStages;
use App\Models\Applications;
use Illuminate\Http\Request;

class RecruitmentStagesController extends Controller
{
   
    public function index()
    {
        $recruitmentStages = RecruitmentStages::with('application')->get();
        $applications = Applications::all();
        return view('pages.recruitments.recruitments', compact('recruitmentStages', 'applications'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ApplicationId' => 'required|exists:applications,id',
            'StageName' => 'required|string',
            'StageStatus' => 'required|string',
            'CompletionDate' => 'nullable|date',
        ]);
    
        $stage = new RecruitmentStages();
        $stage->ApplicationId = $validated['Application_id'];
        $stage->StageName = $validated['StageName'];
        $stage->StageStatus = $validated['StageStatus'];
        $stage->CompletionDate = $validated['CompletionDate'] ?? null;
        $stage->save();
    
        return redirect()->back()->with('success', 'Stage added successfully!');
    }

    public function edit($id)
    {
        $stage = RecruitmentStage::findOrFail($id);
        $applications = Applications::all();
        return view('pages.recruitmentstage.edit', compact('stage', 'applications'));
    }

    public function update(Request $request, $id)
    {
        $stage = RecruitmentStage::findOrFail($id);

        $validated = $request->validate([
            'ApplicationId' => 'required|exists:applications,id',
            'StageName' => 'required|string',
            'StageStatus' => 'required|string',
            'CompletionDate' => 'nullable|date',
        ]);

        $stage->update($validated);
        return redirect()->route('recruitmentstage.index')->with('success', 'Stage updated.');
    }

    public function destroy($id)
    {
        $stage = RecruitmentStage::findOrFail($id);
        $stage->delete();

        return redirect()->back()->with('success', 'Stage deleted.');
    }
}
