<?php

namespace App\Repositories;

use App\Models\UserPaper;
use Symfony\Component\HttpFoundation\Request;

class UserPaperRepository
{
    public function searchFromRequest($request)
    {

        $userPaper = UserPaper::orderBy('id', 'DESC')
            ->when($request->filled('identifier'), function ($userPaper) use ($request) {
                $userPaper->where('identifier', 'like', '%' . $request->query->get('identifier') . '%');
            });

        return $userPaper;
    }

}
