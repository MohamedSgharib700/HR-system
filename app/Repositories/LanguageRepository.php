<?php

namespace App\Repositories;

use App\Models\Language;
use Symfony\Component\HttpFoundation\Request;

class LanguageRepository
{
    public function search(Request $request)
    {
        $languages = Language::query()->orderByDesc("id");

        if ($request->has('active') && !empty($request->get('active'))) {
            $languages->where('active', $request->get('active')) ;
        }
        return $languages;
    }
}
