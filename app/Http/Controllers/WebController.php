<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function welcome()
    {
        return view('welcome', [
            'services' => Service::all(),
        ]);
    }

    public function portfolio()
    {
        return view('portdolio', [
            'works' => Work::all(),
        ]);
    }

    public function about()
    {
        return view('about');
    }

    public function contacts()
    {
        return view('contacts');
    }

    public function profile()
    {
        return view('User.profile', [
            'user' => Auth::user(),
        ]);
    }
}
