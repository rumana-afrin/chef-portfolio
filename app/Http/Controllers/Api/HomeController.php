<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Models\PersonalInfo;
use App\Models\RecipeCategory;
use App\Models\Setting;
use App\Models\Skill;

class HomeController extends Controller
{
    public function experience(){
        $experience = Experience::all();
        return response()->json($experience);
    }
    public function skill(){
        $skills = Skill::all();
        return response()->json($skills);
    }
    public function homeSettingData(){
        $homeSettings = Setting::where('option_key', 'like', 'home_%')
            ->orWhere('option_key', 'like', 'app_%')
            ->get();
    
        $formatted = $homeSettings->mapWithKeys(function ($item) {
            $value = $item->option_key === 'home_skill_image' || $item->option_key === 'home_banner_image'
                ? url('storage/' . $item->option_value) 
                : $item->option_value;
    
            return [$item->option_key => $value];
        });
    
        return response()->json($formatted);
    }
    public function recipeCategories() {
        $categories = RecipeCategory::all();
    
        foreach ($categories as $category) {
            $category->category_image = url('storage/' . $category->category_image); // Convert to full URL
        }
    
        return response()->json($categories);
    }
    public function personalInfo() {
        $personal_info = PersonalInfo::all();
        return response()->json($personal_info);
    }

    
}
