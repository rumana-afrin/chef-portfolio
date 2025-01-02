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
        $data['showSettingMenu'] = 'show'; 
        $data['activeSettingSubMenu'] = 'active';
        return view('web-page.general-setting')->with($data);
    }
    public function recipeBanner(){
        $data['pageTitle'] = 'Recipe Banner';
        $data['showMenu'] = 'show'; 
        $data['activeSubMenu'] = 'active';
        return view('web-page.recipes.recipe-banner')->with($data);
    }
    public function jobObjective(){
        $data['pageTitle'] = 'Recipe Banner';
        $data['showMenu'] = 'show'; 
        $data['activeSubMenu'] = 'active';
        return view('web-page.about.job-objective')->with($data);
    }
    public function updateSetting(Request $request)
    {

 
        $inpute = Arr::except($request->all(), ['_token', 'home_experience', 'home_skill']);
        // dd($inpute);
        foreach ($inpute as $key => $value) {
            // $option = Setting::firstOrCreate(["option_key" => $key]);
            $option = Setting::firstOrCreate(["option_key" => $key], ["option_value" => " "]); // Default value to prevent SQL error

            if ($request->hasFile('home_banner_image') && $key == 'home_banner_image') {
                $oldFile = $option->option_value;
                $upload = uploadFile('setting', $request->home_banner_image, $oldFile);
                $option->option_value = $upload;
            }elseif ($request->hasFile('home_skill_image') && $key == 'home_skill_image') {
                $oldFile = $option->option_value;
                $upload = uploadFile('setting', $request->home_skill_image, $oldFile);
                $option->option_value = $upload;
            }elseif ($request->hasFile('app_logo') && $key == 'app_logo') {
                $oldFile = $option->option_value; // Get the old file path
                $upload = uploadFile('setting', $request->app_logo, $oldFile);
                $option->option_value = $upload;
            }elseif ($request->hasFile('app_favicon') && $key == 'app_favicon') {
                $oldFile = $option->option_value;
                $upload = uploadFile('setting', $request->app_favicon, $oldFile);
                $option->option_value = $upload;
            }elseif ($request->hasFile('all_recipe_banner') && $key == 'all_recipe_banner') {
                $oldFile = $option->option_value;
                $upload = uploadFile('setting', $request->all_recipe_banner, $oldFile);
                $option->option_value = $upload;
            }elseif ($request->hasFile('vegetable_recipe_banner') && $key == 'vegetable_recipe_banner') {
                $oldFile = $option->option_value;
                $upload = uploadFile('setting', $request->vegetable_recipe_banner, $oldFile);
                $option->option_value = $upload;
            }elseif ($request->hasFile('non_veg_banner') && $key == 'non_veg_banner') {
                $oldFile = $option->option_value;
                $upload = uploadFile('setting', $request->non_veg_banner, $oldFile);
                $option->option_value = $upload;
            }elseif ($request->hasFile('non_veg_leftsidebanner') && $key == 'non_veg_leftsidebanner') {
                $oldFile = $option->option_value;
                $upload = uploadFile('setting', $request->non_veg_leftsidebanner, $oldFile);
                $option->option_value = $upload;
            }elseif ($request->hasFile('non_veg_rightsidebanner') && $key == 'non_veg_rightsidebanner') {
                $oldFile = $option->option_value;
                $upload = uploadFile('setting', $request->non_veg_rightsidebanner, $oldFile);
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
        }else{
            Experience::truncate(); // Delete all records
        }

        // Insert skills
        if (!empty($skills)) {
            Skill::truncate(); // Delete all records
            foreach ($skills as $skill) {
                Skill::create(['skill' => $skill]); // Insert new record
            }
        }else{
            Skill::truncate(); // Delete all records
        }
        return redirect()->back()->with('success', UPDATED_SUCCESSFULLY);
    }
}
