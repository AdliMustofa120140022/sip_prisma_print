<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;

class FileHelper
{
    public static function uploadFile(UploadedFile $file, $path)
    {
        $fileName = time() . '.' . $file->getClientOriginalName();
        $file->storeAs('public/' . $path, $fileName);
        $timeStamp = time();
        return $fileName;
    }

    public static function deleteFile($path)
    {
        if (file_exists($path)) {
            unlink($path);
        }
    }
}
