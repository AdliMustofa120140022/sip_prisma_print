<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;

class FileHelper
{
    public static function uploadFile(UploadedFile $file, $path)
    {
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/' . $path, $fileName);
        return $fileName;
    }

    public static function deleteFile($path)
    {
        if (file_exists($path)) {
            unlink($path);
        }
    }
}
