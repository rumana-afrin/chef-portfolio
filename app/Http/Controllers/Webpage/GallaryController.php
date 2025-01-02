<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Gallary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GallaryController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'All Gallary';
        $data['gallaries'] = Gallary::all();
        $data['albums'] = Album::all();
        return view('web-page.gallary.index')->with($data);
    }
    public function create()
    {
        $data['pageTitle'] = 'Add Gallary';
        $data['albums'] = Album::all();
        return view('web-page.gallary.create')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'album_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $gallary = new Gallary();
        $gallary->title = $request->title;
        $gallary->album_id = $request->album_id;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . $image->getClientOriginalName();
            $name = pathinfo($imageName, PATHINFO_FILENAME);
            $extension = pathinfo($imageName, PATHINFO_EXTENSION);
            $fileName = preg_replace('/\s+/', '', $name);
            $fileName = preg_replace('[^A-Za-z1-0\-]', '', $fileName);
            $file_name = $fileName . '.' .$extension;
            $store = $image->storeAs('upload', $file_name , 'public');
            $gallary->image = $store;
        }
        $gallary->save();

        return redirect()->route('gallary-index')->with('success', CREATED_SUCCESSFULLY);


    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|string|max:255',
            'album_id' => 'required',
        ]);

        $gallary = Gallary::where('id', $id)->first();
        $gallary->title = $request->title;
        $gallary->album_id = $request->album_id;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . $image->getClientOriginalName();
            $name = pathinfo($imageName, PATHINFO_FILENAME);
            $extension = pathinfo($imageName, PATHINFO_EXTENSION);
            $fileName = preg_replace('/\s+/', '', $name);
            $fileName = preg_replace('[^A-Za-z1-0\-]', '', $fileName);
            $file_name = $fileName . '.' .$extension;
            $store = $image->storeAs('upload', $file_name , 'public');
           

            if( $gallary->image && Storage::disk('public')->exists($gallary->image)){
                Storage::disk('public')->delete($gallary->image);
            }

            $gallary->image = $store;
        }

        // dd($gallary);
        $gallary->update();
        return redirect()->route('gallary-index')->with('success', DELETED_SUCCESSFULLY);

    }

    public function delete($id){
        $gallary = Gallary::where('id', $id)->first();
        if($gallary->image && Storage::disk('public')->exists($gallary->image)){
            Storage::disk('public')->delete($gallary->image);
        }
        $gallary->delete();
        return redirect()->route('gallary-index')->with('success', DELETED_SUCCESSFULLY);

    }
}
