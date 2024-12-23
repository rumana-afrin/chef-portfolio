<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\PersonalInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersonalInfoController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'Personal Information';
        $data['personalInfos'] = PersonalInfo::all();  // Fetch the first record from the personal_infos table.
        return view('web-page.about.personal-info.index')->with($data);  // Load the contact-info.index view with the data array.
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:personal_infos,email',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'linkedin' => 'required|url',
            'facebook' => 'nullable|url',
            'youtube' => 'nullable|url',
            'pinterest' => 'nullable|url',
            'twitter' => 'nullable|url',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $info = new PersonalInfo();
        $info->name = $request->name;
        $info->email = $request->email;
        $info->phone = $request->phone;
        $info->address = $request->address;
        $info->designation = $request->designation;
        $info->linkedin = $request->linkedin;
        $info->facebook = $request->facebook;
        $info->youtube = $request->youtube;
        $info->pinterest = $request->pinterest;
        $info->twitter = $request->twitter;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . $image->getClientOriginalName();
            $name = pathinfo($imageName, PATHINFO_FILENAME);
            $extension = pathinfo($imageName, PATHINFO_EXTENSION);
            $fileName = preg_replace('/\s+/', '', $name);
            $fileName = preg_replace('[^A-Za-z1-0\-]', '', $fileName);
            $file_name = $fileName . '.' . $extension;
            $store = $image->storeAs('upload', $file_name, 'public');
            $info->image = $store;
        }
        $info->firstOrCreate();
        return redirect()->route('contact-info')->with('success', CREATED_SUCCESSFULLY);
    }

    public function edit($id)
    {
        $data['pageTitle'] = 'Personal Information';
        $data['personalInfo'] = PersonalInfo::where('id', $id)->first();  // Fetch the first record from the personal_infos table.
        return view('web-page.about.personal-info.edit')->with($data);  // Load the contact-info.index view with the data array.
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:personal_infos,email,'. $request->id,
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'linkedin' => 'required|url',
            'facebook' => 'nullable|url',
            'youtube' => 'nullable|url',
            'pinterest' => 'nullable|url',
            'twitter' => 'nullable|url',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
            
        ]);

        $info = PersonalInfo::where('id',$id)->first();
        $info->name = $request->name;
        $info->email = $request->email;
        $info->phone = $request->phone;
        $info->address = $request->address;
        $info->designation = $request->designation;
        $info->linkedin = $request->linkedin;
        $info->facebook = $request->facebook;
        $info->youtube = $request->youtube;
        $info->pinterest = $request->pinterest;
        $info->twitter = $request->twitter;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . $image->getClientOriginalName();
            $name = pathinfo($imageName, PATHINFO_FILENAME);
            $extension = pathinfo($imageName, PATHINFO_EXTENSION);
            $fileName = preg_replace('/\s+/', '', $name);
            $fileName = preg_replace('[^A-Za-z1-0\-]', '', $fileName);
            $file_name = $fileName . '.' . $extension;
            $store = $image->storeAs('upload', $file_name, 'public');

            if($request->image && Storage::disk('public')->exists($request->image)){
                Storage::disk('public')->delete($request->image);
            }
            $info->image = $store;
        }
        $info->update();
        return redirect()->route('contact-info')->with('success', UPDATED_SUCCESSFULLY);
    }

}
