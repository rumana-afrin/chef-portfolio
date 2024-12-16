<?php

namespace App\Http\Controllers\Webpage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Models\Setting;
use App\Models\Skill;
use Illuminate\Support\Arr;


class SettingController extends Controller
{

    public function appSetting(){
        $data['pageTitle'] = 'App Setting';
        return view('web-page.general-setting')->with($data);
    }
    public function updateSetting(Request $request)
    {


        $inpute = Arr::except($request->all(), ['_token', 'home_experience', 'home_skill']);
        // dd($inpute);
        foreach ($inpute as $key => $value) {
            // $option = Setting::firstOrCreate(["option_key" => $key]);
            $option = Setting::firstOrCreate(["option_key" => $key], ["option_value" => ""]); // Default value to prevent SQL error

            if ($request->hasFile('home_banner_image') && $key == 'home_banner_image') {
                $upload = uploadFile('setting', $request->home_banner_image);
                $option->option_value = $upload;
            }elseif ($request->hasFile('home_skill_image') && $key == 'home_skill_image') {
                $upload = uploadFile('setting', $request->home_skill_image);
                $option->option_value = $upload;
            }elseif ($request->hasFile('app_logo') && $key == 'app_logo') {
                $oldFile = $option->option_value; // Get the old file path
                $upload = uploadFile('setting', $request->app_logo, $oldFile);
                $option->option_value = $upload;
            }elseif ($request->hasFile('app_favicon') && $key == 'app_favicon') {
                $upload = uploadFile('setting', $request->app_favicon);
                $option->option_value = $upload;
            }else {
                $option->option_value = $value;
            }
            $option->save();
        }

        $data = Arr::only($request->all(), ['home_experience', 'home_skill']);

        $experiences = $data['home_experience'] ?? []; // null colesing oprerator. value na thakle error na dekhiea empty aary show korbe.
        $skills = $data['home_skill'] ?? [];

        // Insert experiences
        if (!empty($experiences)) {
            Experience::truncate(); // Delete all records
            foreach ($experiences as $exp) {
                Experience::create(['experience' => $exp]); // Insert new record
            }
        }

        // Insert skills
        if (!empty($skills)) {
            Skill::truncate(); // Delete all records
            foreach ($skills as $skill) {
                Skill::create(['skill' => $skill]); // Insert new record
            }
        }
        return redirect()->back()->with('success', UPDATED_SUCCESSFULLY);
    }
}
