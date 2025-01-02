<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\RecipeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecipeCategoryController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'Recipe Category';
        $data['showMenu'] = 'show'; 
        $data['activeSubMenu'] = 'active';
        $data['categories'] = RecipeCategory::all();
        return view('web-page.recipes.recipe-category.index')->with($data);
    }

    public function create()
    {
        $data['pageTitle'] = 'Add Recipe Category';
        $data['showMenu'] = 'show'; 
        $data['activeSubMenu'] = 'active';
        return view('web-page.recipes.recipe-category.create')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $category = new RecipeCategory();
        $category->category_name = $request->category_name;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . $image->getClientOriginalName();
            $name = pathinfo($imageName, PATHINFO_FILENAME);
            $extension = pathinfo($imageName, PATHINFO_EXTENSION);
            $fileName = preg_replace('/\s+/', '', $name);
            $fileName = preg_replace('[^A-Za-z1-0\-]', '', $fileName);
            $file_name = $fileName . '.' . $extension;
            $store = $image->storeAs('upload', $file_name, 'public');
            $category->category_image = $store;
        }
        $category->save();

        return redirect()->route('all.recipe.category')->with('success', CREATED_SUCCESSFULLY);
    }

    public function update(Request $request, $id){
        $request->validate([
            'category_name' => 'string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $category = RecipeCategory::where('id', $id)->first();
        $category->category_name = $request->category_name;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . $image->getClientOriginalName();
            $name = pathinfo($imageName, PATHINFO_FILENAME);
            $extension = pathinfo($imageName, PATHINFO_EXTENSION);
            $fileName = preg_replace('/\s+/', '', $name);
            $fileName = preg_replace('[^A-Za-z1-0\-]', '', $fileName);
            $file_name = $fileName . '.' .$extension;
            $store = $image->storeAs('upload', $file_name , 'public');
           

            if( $category->category_image && Storage::disk('public')->exists($category->category_image)){
                Storage::disk('public')->delete($category->category_image);
            }

            $category->category_image = $store;
        }

        // dd($category);
        $category->update();
        return redirect()->route('all.recipe.category')->with('success', UPDATED_SUCCESSFULLY);

    }

    public function destroy($id){
        $category = RecipeCategory::where('id', $id)->first();
        if($category->category_image && Storage::disk('public')->exists($category->category_image)){
            Storage::disk('public')->delete($category->category_image);
        }
        $category->delete();
        return redirect()->route('all.recipe.category')->with('success', DELETED_SUCCESSFULLY);

    }
}
