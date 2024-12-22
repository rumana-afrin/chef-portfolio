<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'All Education';
        $data['educations'] = Education::all();
        return view('web-page.about.education.index')->with($data);
    }
    public function create()
    {
        $data['pageTitle'] = 'Add Education';
        return view('web-page.about.education.create')->with($data);
    }
    public function store(Request $request)
    {

        $request->validate([
            'institution' => 'required',
            'location' => 'required',
            'degree' => 'nullable',
            'year_completed' => 'nullable',
        ]);
        $education = new Education();
        $education->institution = $request->institution;
        $education->location = $request->location;
        $education->degree = $request->degree;
        $education->year_completed = $request->year_completed;
        $education->save();
        return redirect()->route('all-education')->with('success', CREATED_SUCCESSFULLY);
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'institution' => 'required',
            'location' => 'required',
            'degree' => 'nullable',
            'year_completed' => 'nullable',
        ]);
        Education::where('id', $id)->update([
            'institution' => $request->institution,
            'location' => $request->location,
            'degree' => $request->degree,
            'year_completed' => $request->year_completed,
        ]);;
   
        return redirect()->route('all-education')->with('success', UPDATED_SUCCESSFULLY);
    }

    public function destroy($id){
        Education::where('id', $id)->delete();
        return redirect()->route('all-education')->with('success', DELETED_SUCCESSFULLY);
    }
}
