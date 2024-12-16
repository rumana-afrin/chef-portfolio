<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Models\Skill;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'Home';
        $data['experiences'] = Experience::all();
        $data['skills'] = Skill::all();

        return view('web-page.home.create')->with($data);
    }
}
