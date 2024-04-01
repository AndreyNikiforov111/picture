<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ZipArchive;

class DownloadController extends Controller
{
    public function __invoke(Request $request)
    {

        $file = $request->input('download');
        // Создаем временный файл для хранения zip-архива
        $zipFileName = 'files.zip';
        $zip = new ZipArchive;
        if ($zip->open($zipFileName, ZipArchive::CREATE) === TRUE) {
            //foreach ($files as $file) {
                $filePath = 'images/' . $file; // Путь к файлу
                $zip->addFile(public_path($filePath), $file); // Добавляем файл в архив
            //}
            $zip->close();
        }

        // Предоставляем архив для скачивания
        return response()->download($zipFileName)->deleteFileAfterSend(true); // Удаляем временный файл после отправки


    }
}
