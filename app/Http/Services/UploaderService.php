<?php

namespace App\Http\Services;

use File;
use Illuminate\Http\UploadedFile;

class UploaderService
{
    /**
     * @param UploadedFile $file
     * @param $folder
     * @return string
     */
    public function upload(UploadedFile $file, $folder, $user = "")
    {
        $date_path = date("Y") . '/' . date("m") . '/' . date("d") . '/';
        if ($user) {
            $date_path = $user->machine_code . '/';
        }
        $path = public_path() . '/assets/uploads/' . $folder . '/' . $date_path;

        if (!File::exists($path)) {
            File::makeDirectory($path, 0777, true);
        }

        $file_name = date('YmdHis') . mt_rand() . '_' . $folder . '.' . $file->getClientOriginalExtension();

        if ($file->move($path, $file_name)) {
            return $img = '/assets/uploads/' . $folder . '/' . $date_path . $file_name;
        }
    }

    /**
     * This function to Delete file from directoru
     * @param $file_name
     * @return bool
     */
    public function deleteFile($fileName)
    {
        $filePath = public_path() . $fileName;
        if (File::exists($filePath)) {
            File::delete($filePath);
        }
        return true;
    }
}
