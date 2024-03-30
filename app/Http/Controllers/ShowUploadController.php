<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ShowUploadController extends Controller
{
    public function __invoke()
    {
        $uploadImages = Image::all();

        return view('welcome')->with('uploadImages', $uploadImages);
    }
}
