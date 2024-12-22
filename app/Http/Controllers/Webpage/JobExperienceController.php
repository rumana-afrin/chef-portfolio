<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\JobExperience;
use Illuminate\Http\Request;

class JobExperienceController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'Job Experience';
        $data['job_experiences'] = JobExperience::all();
        return view('web-page.about.job-experience.index')->with($data);
    }
    public function create()
    {
        $data['pageTitle'] = 'Add Experience';
        return view('web-page.about.job-experience.create')->with($data);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'company_name' => 'required',
            'designation' => 'required',
            'role_description' => 'required',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
        ]);

        $exp = new JobExperience();
        $exp->company_name = $request->company_name;
        $exp->designation = $request->designation;
        $exp->role_description = $request->role_description;
        $exp->start_date = $request->start_date;
        $exp->end_date = $request->end_date;
        $exp->save();
        return redirect()->route('all-experiance')->with('success', CREATED_SUCCESSFULLY);
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'company_name' => 'required',
            'designation' => 'required',
            'role_description' => 'required',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
        ]);

        $exp = JobExperience::where('id', $id)->first();
        $exp->company_name = $request->company_name;
        $exp->designation = $request->designation;
        $exp->role_description = $request->role_description;
        $exp->start_date = $request->start_date;
        $exp->end_date = $request->end_date;
        $exp->update();
        return redirect()->route('all-experiance')->with('success', UPDATED_SUCCESSFULLY);
    }

    public function destroy($id){
        JobExperience::where('id', $id)->delete();
        return redirect()->route('all-experiance')->with('success', DELETED_SUCCESSFULLY);
    }
}
