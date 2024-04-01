<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use League\CommonMark\Normalizer\SlugNormalizer;


class ImageUploadController extends Controller
{
    public function __invoke(ImageRequest $request)
    {

        $images = $request->file('images');

        if(count($images) > 5) {
            return back()->with('error', 'Можно загрузить до 5 файлов одновременно.');
        }
        for ($i=0;$i<count($images); $i++) {
            $originalName = $images[$i]->getClientOriginalName();
            $imageName = Str::lower(Str::ascii(pathinfo($originalName, PATHINFO_FILENAME))); // Получаем название файла без расширения и приводим к нижнему регистру
            $extension = $images[$i]->getClientOriginalExtension();
            //$fullName = $imageName . '.' . $extension;

            $fullName = $imageName.'-'. Str::uuid()->toString() . '.' . $extension; // Генерация уникального имени файла

            while (file_exists(public_path('images/' . $fullName))) {
                $fullName = Str::uuid()->toString() . '.' . $extension; // Проверяем уникальность имени, если существует файл с таким именем, генерируем новое
            }

            $request->images[$i]->move(public_path('images'), $fullName);
            $image = new Image;
            $image->filename = $fullName;
            $image->save();

        }

        return redirect()->back()->with('success', 'Изображения успешно загружены.');
    }





//        foreach ($images as $image) {
//            $imageName = Str::lower(Str::ascii($image->getClientOriginalName()));
//           // dd($imageName);
//            // Тут можете сохранить изображение или сделать дальнейшие операции с ним
//            $image->storeAs('images', $imageName);
//        }
        /*$request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file4' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file5' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $transliteratedName = new SlugNormalizer;
        $transliteratedName->normalize($imageName);
    dd($transliteratedName);
        $request->image->move(public_path('images'), $transliteratedName);


        // Save the image file name into the database
        $image = new Image;
        $image->filename = $imageName;
        $image->save();*/

//        return back()
//            ->with('success','You have successfully upload image.')
//            ->with('image',$imageName);
//    }
}
