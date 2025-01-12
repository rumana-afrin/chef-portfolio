<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use App\Models\RecipeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    public function index()
    {
        $data['pageTitle'] = 'All Recipes';
        $data['recipes'] = Recipe::with('category')->get();
        $data['categories'] = RecipeCategory::all();
        $data['showrecipeMenu'] = 'show';
        $data['activeAllRecipeSubMenu'] = 'active';
        return view('web-page.recipes.recipe.index')->with($data);
    }
    public function edit($id)
    {
        $data['recipe'] = Recipe::find($id);
        $data['pageTitle'] = 'Edit Recipes';
        $data['categories'] = RecipeCategory::all();
        $data['showrecipeMenu'] = 'show';
        $data['activeAllRecipeSubMenu'] = 'active';
        return view('web-page.recipes.recipe.edit')->with($data);
    }
    public function create()
    {
        $data['pageTitle'] = 'Add Recipes';
        $data['categories'] = RecipeCategory::all();
        $data['showrecipeMenu'] = 'show';
        $data['activeAddRecipeSubMenu'] = 'active';
        return view('web-page.recipes.recipe.create')->with($data);
    }
    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'recipe_category_id' => 'required',
            'description' => 'required',
            'ingredients' => 'nullable',
            'instructions' => 'nullable',
            'nutritious' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $recipe = new Recipe();
        $recipe->name = $request->name;
        $recipe->recipe_category_id = $request->recipe_category_id;
        $recipe->description = $request->description;
        $recipe->ingredients = $request->ingredients;
        $recipe->instructions = $request->instructions;
        $recipe->nutritious = $request->nutritious;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . $image->getClientOriginalName();
            $name = pathinfo($imageName, PATHINFO_FILENAME);
            $extension = pathinfo($imageName, PATHINFO_EXTENSION);
            $fileName = preg_replace('/\s+/', '', $name);
            $fileName = preg_replace('[^A-Za-z1-0\-]', '', $fileName);
            $file_name = $fileName . '.' . $extension;
            $store = $image->storeAs('upload', $file_name, 'public');
            $recipe->image = $store;
        }
        $recipe->save();

        return redirect()->route('all.recipe')->with('success', CREATED_SUCCESSFULLY);
    }


    public function show($id)
    {
        $data['pageTitle'] = 'Recipes Details';
        $data['showrecipeMenu'] = 'show';
        $data['activeAllRecipeSubMenu'] = 'active';
        $data['recipe'] = Recipe::with('category')->where('id', $id)->first();
        return view('web-page.recipes.recipe.show')->with($data);
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'recipe_category_id' => 'required',
            'description' => 'required',
            'ingredients' => 'nullable',
            'instructions' => 'nullable',
            'nutritious' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $recipe = Recipe::where('id', $id)->first();
        $recipe->name = $request->name;
        $recipe->recipe_category_id = $request->recipe_category_id;
        $recipe->description = $request->description;
        $recipe->ingredients = $request->ingredients;
        $recipe->instructions = $request->instructions;
        $recipe->nutritious = $request->nutritious;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . $image->getClientOriginalName();
            $name = pathinfo($imageName, PATHINFO_FILENAME);
            $extension = pathinfo($imageName, PATHINFO_EXTENSION);
            $fileName = preg_replace('/\s+/', '', $name);
            $fileName = preg_replace('[^A-Za-z1-0\-]', '', $fileName);
            $file_name = $fileName . '.' . $extension;
            $store = $image->storeAs('upload', $file_name, 'public');

            if ($recipe->image && Storage::disk('public')->exists($recipe->image)) {
                Storage::disk('public')->delete($recipe->image);
            }
            $recipe->image = $store;
        }
        $recipe->save();

        return redirect()->route('all.recipe')->with('success', UPDATED_SUCCESSFULLY);
    }

    public function destroy($id)
    {
        $recipe = Recipe::where('id', $id)->first();
        if ($recipe->image && Storage::disk('public')->exists($recipe->image)) {
            Storage::disk('public')->delete($recipe->image);
        }

        $recipe->delete();
        return redirect()->route('all.recipe')->with('success', DELETED_SUCCESSFULLY);
    }
}
