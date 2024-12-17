<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
       
        $data['pageTitle'] = 'All Album';
        $data['albums'] = Album::all();
        return view('web-page.gallary.album.index')->with($data);
    }
    
    public function create()
    {
        $data['pageTitle'] = 'Add Album';
        return view('web-page.gallary.album.create')->with($data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'album_name' => 'required|string|max:255',
        ]);
        Album::create([
            'album_name' => $request->album_name,
        ]);
        return redirect()->route('album.index')->with('success', CREATED_SUCCESSFULLY);
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'album_name' => 'string|max:255',
        ]);
        $album = [
            'album_name' =>$validated['album_name'],  // replace 'album_name' with your actual column name in the database table 'albums'  // replace 'album_name' with your actual column name in the database table 'albums'  // replace 'album_name' with your actual column name in the database table 'albums'  // replace 'album_name' with your actual column name in the database table 'albums'  // replace 'album_name' with your actual column name in the database table 'albums'  // replace 'album_name' with your actual column name in the database table 'albums'  // replace 'album_name' with your actual column name in the database table 'albums'  // replace 'album_name' with your actual column name in the database table 'albums'  // replace 'album_name' with your actual column name in the database table 'albums'  // replace 'album_
        ];


       Album::where('id', $id)->update($album);
        return redirect()->route('album.index')->with('success', UPDATED_SUCCESSFULLY);

    }
    public function delete($id)
    {
        Album::where('id', $id)->delete();
        return redirect()->route('album.index')->with('success', DELETED_SUCCESSFULLY);
    }
}
