<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;
use PharIo\Manifest\Url;

class CarouselController extends Controller
{
    public function carousel(){
        $carousels = Carousel::all();

        foreach($carousels as $carousel)
        {
            $carousel->image = url("storage/" . $carousel->image);
        }
        if(!$carousels){
            return response()->json(['message' => 'carousel not found'], 404);  // Return 404 status code if no carousels found in the database  // Return 400 status code if there is an error in the request (e.g., validation error)  // Return 200 status code if the request is successful and the data is returned correctly  // Return 500 status code if there is an error in the server (e.g., database error)  // Return 304 status code if the requested data has not changed since the last request  // Return 412 status code if the request failed the precondition (e.g., authorization error)  // Return 429 status code if the client has exceeded the rate limit  // Return 503 status code if the server is temporarily unavailable or overloaded  // Return 401 status code if the client is not
        }
        return response()->json($carousels);
    }
}
