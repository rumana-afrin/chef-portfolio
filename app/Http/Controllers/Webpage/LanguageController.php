<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'Language';
        $data['languages'] = Language::all();
        return view('web-page.about.language.index')->with($data);
    }

    public function create()
    {
        $data['pageTitle'] = 'Add Language';
        return view('web-page.about.language.create')->with($data);
    }
    public function store(Request $request)
    {
       
        $request->validate([
            'language' => 'required',
        ]);
        Language::create([
            'language' => $request->language,
        ]);

        return redirect()->route('all-language')->with('success', 'Language added successfully');
    }
    public function update(Request $request,$id)
    {
       
        $request->validate([
            'language' => 'required',
        ]);


        Language::where('id',$id)->update([
            'language' => $request->language,
        ]);

        return redirect()->route('all-language')->with('success', 'Language added successfully');
    }

    public function destroy($id){
        Language::where('id',$id)->delete();
        return redirect()->route('all-language')->with('success', 'Language added successfully');
    }
}
