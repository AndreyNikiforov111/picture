<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class JsonFileController extends Controller
{
    public function index(){
        $images = Image::all();
        return response()->json($images);
    }
    public function show($id)
    {
        $image = Image::find($id);
        if (!$image) {
            return response()->json(['error' => 'File not found'], 404);
        }
        return response()->json($image);
    }
}
