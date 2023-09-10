<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\profile;


class CheckProfileOwnership
{
    public function handle(Request $request, Closure $next)
    {
        $profileId = $request->route()->parameter('profile');
        $profile = Profile::findOrFail($profileId);

        if ($profile->id != auth()->user()->id) {
            return dd($profile);
        }

        return $next($request);
    }
}

