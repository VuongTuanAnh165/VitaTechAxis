<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class Upload
{
    /**
     * Get File Extension
     * @param $name
     * @param $request
     * @return string
     */
    public static function getFileExtension($name, $request)
    {
        if (!$request->hasFile($name)) {
            return '';
        }

        $image = $request->file($name);
        return $image->getClientOriginalExtension();
    }


    /**
     * Upload Origin File
     * @param $image
     * @param $uploadPath
     * @param $name
     * @param $request
     * @return string
     */
    public static function uploadFileOrigin($image, $uploadPath, $name, $request)
    {
        if (!$request->hasFile($name)) {
            return '';
        }

        $imageName = $image->getClientOriginalName();
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $image->move($uploadPath, $imageName);
        return '/' . $uploadPath . $imageName;
    }

    /**
     * Get Origin File
     * @param $name
     * @param $uploadPath
     * @param $request
     * @return string
     */
    public static function getOriginFile($name, $uploadPath, $request)
    {
        if (!$request->hasFile($name)) {
            return '';
        }

        $file = $request->file($name);
        return self::uploadFileOrigin($file, $uploadPath, $name, $request);
    }

    /**
     * Handle Upload Image
     * @param string $uploadPath
     * @param $name
     * @param $request
     * @return string
     */
    public static function handleUploadFile($uploadPath, $name, $request)
    {
        $fullPath = '';
        if (!$request->hasFile($name)) {
            return $fullPath;
        }

        $file = $request->file($name);
        $saveName = $file->hashName();
        $fullPath = $uploadPath . $saveName;
        if (!Storage::disk('public')->exists($uploadPath)) {
            Storage::disk('public')->makeDirectory($uploadPath);
        }
        Storage::disk('public')->put($fullPath, file_get_contents($file));
        return $fullPath;
    }

    /**
     * Handle Remove Image
     * @param string $uploadPath
     * @param $name
     * @param $request
     * @return string
     */
    public static function handleRemoveFile($uploadPath, $name, $request)
    {
        $fullPath = '';
        if (!$request->hasFile($name)) {
            return $fullPath;
        }

        $fileDelete = $request->get($name);
        $fullPath = $uploadPath . $fileDelete;
        if (Storage::disk('public')->exists($fullPath)) {
            Storage::disk('public')->delete($fullPath);
        }
        return $fullPath;
    }

    /**
     * Handle Remove file
     * @param $name
     * @param $request
     * @return string
     */
    public static function handleDeleteFile($name, $request)
    {
        $fileDelete = $request->get($name);
        if (Storage::disk('public')->exists($fileDelete)) {
            Storage::disk('public')->delete($fileDelete);
        }
        return $fileDelete;
    }

    public static function deleteFile($path)
    {
        Storage::disk('public')->delete($path);
    }
}