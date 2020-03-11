<?php

namespace App\Http\Services;

use App\Models\User;
use App\Models\UserPaper;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Http\UploadedFile;

class UserPaperService
{

    private $uploaderService;

    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }

    public function fillFromRequest(Request $request, $user)
    {
        if ($request->has("image")) {
            $this->savePaperImages($request, $user);
        }
    }


    /**
     * @param UploadedFile [] $images
     * @param User $user
     * @return void
     */
    private function savePaperImages($request, User $user)
    {
        $paperImages = [];
        $i = 0;
        foreach ($request->file("image") as $image) {
            $img = $this->uploaderService->upload($image, "userPapers",$user);
            $paperImages[] = new UserPaper(["image" => $img, 'identifier' => $request->get('identifier')[$i]]);
            $i++;
        }

        $user->papers()->saveMany($paperImages);
    }
}

