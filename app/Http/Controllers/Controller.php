<?php

namespace App\Http\Controllers;
use Storage;
abstract class Controller
{
    //
    public function __construct() {
        date_default_timezone_set('Asia/Kolkata');
    }

    protected function uploadFile($file, $folder = 'upload', $disk = 's3') {
        try {
            $fileName = date('dmYHis') . '.' . $file->getClientOriginalExtension();
            $filePath = rtrim($folder, '/') . '/' . ltrim($fileName, '/');
            Storage::disk($disk)->putFileAs(
            $folder,            // Folder path
            $file,              // UploadedFile instance
            $fileName,          // File name
            ['visibility' => 'public'] // Make it public
        );
 
           return Storage::disk('s3')->url($filePath);
        } catch (\Exception $e) {
            return false;
        }
    }
}
