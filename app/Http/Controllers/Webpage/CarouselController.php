<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'All Carousel';
        $data['carousels'] = Carousel::all();
        return view('web-page.recipes.carousel.index')->with($data);
    }

    public function create()
    {
        $data['pageTitle'] = 'Add Carousel';
        return view('web-page.recipes.carousel.create')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $carousel = new Carousel();
        $carousel->image_name = $request->image_name;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . $image->getClientOriginalName();
            $name = pathinfo($imageName, PATHINFO_FILENAME);
            $extension = pathinfo($imageName, PATHINFO_EXTENSION);
            $fileName = preg_replace('/\s+/', '', $name);
            $fileName = preg_replace('[^A-Za-z1-0\-]', '', $fileName);
            $file_name = $fileName . '.' . $extension;
            $store = $image->storeAs('upload', $file_name, 'public');
            $carousel->image = $store;
        }
        $carousel->save();

        return redirect()->route('all.carousel')->with('success', CREATED_SUCCESSFULLY);
    }

    public function update(Request $request, $id){
        $request->validate([
            'image_name' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $carousel = Carousel::where('id', $id)->first();
        $carousel->image_name = $request->image_name;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . $image->getClientOriginalName();
            $name = pathinfo($imageName, PATHINFO_FILENAME);
            $extension = pathinfo($imageName, PATHINFO_EXTENSION);
            $fileName = preg_replace('/\s+/', '', $name);
            $fileName = preg_replace('[^A-Za-z1-0\-]', '', $fileName);
            $file_name = $fileName . '.' .$extension;
            $store = $image->storeAs('upload', $file_name , 'public');
           

            if( $carousel->image && Storage::disk('public')->exists($carousel->image)){
                Storage::disk('public')->delete($carousel->image);
            }

            $carousel->image = $store;
        }

        // dd($carousel);
        $carousel->update();
        return redirect()->route('all.carousel')->with('success', DELETED_SUCCESSFULLY);

    }

    public function destroy($id){
        $gallary = Carousel::where('id', $id)->first();
        if($gallary->image && Storage::disk('public')->exists($gallary->image)){
            Storage::disk('public')->delete($gallary->image);
        }
        $gallary->delete();
        return redirect()->route('all.carousel')->with('success', DELETED_SUCCESSFULLY);

    }
}
