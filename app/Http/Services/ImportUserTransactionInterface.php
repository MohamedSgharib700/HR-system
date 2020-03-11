<?php


namespace App\Http\Services;

use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\Request;


interface ImportUserTransactionInterface
{
    public function process(Request $request);

    public function uploadFile(UploadedFile $file, $folder, $fileName = null);

    public function ProcessDataFromFile($filePath);

}
