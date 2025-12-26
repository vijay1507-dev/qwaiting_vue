<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CookieConsentController extends Controller
{
    public function store(Request $request): Response
    {
        $request->validate([
            'accepted' => ['required', 'boolean'],
        ]);

        $value = $request->boolean('accepted') ? 'accepted' : 'declined';
        $cookie = cookie('cookie_consent', $value, 24 * 60); // 1 day

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Cookie consent saved'], 200)->withCookie($cookie);
        }

        return redirect()->back()->withCookie($cookie);
    }
}
