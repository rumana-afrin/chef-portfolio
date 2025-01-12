<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function allRecipePage()
    {
        $data = Setting::where('option_key', 'like', 'all_recipe_%')->get();

        $formeted = $data->mapWithKeys(function ($item) {
            $value = $item->option_key == "all_recipe_banner" ? url('storage/' . $item->option_value) : $item->option_value;
            return [$item->option_key => $value];
        });

        return response()->json($formeted);
    }
    public function vegetablePage()
    {

        $data = Setting::where('option_key', 'like', 'vegetable_%')->get();

        $formatted = $data->mapWithKeys(function ($item) {
            $value = $item->option_key === 'vegetable_recipe_banner' ? url('storage/' . $item->option_value) : $item->option_value;
    
            return [$item->option_key => $value];
        });
       
        return response()->json($formatted);
    }
}
