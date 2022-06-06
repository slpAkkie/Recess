<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Stuff;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function welcome()
    {
        return view('welcome', [
            'services' => Service::orderBy('created_at', 'DESC')->get(),
        ]);
    }

    public function portfolio()
    {
        return view('portdolio', [
            'works' => Work::orderBy('created_at', 'DESC')->get(),
        ]);
    }

    public function about()
    {
        return view('about', [
            'stuff' => Stuff::orderBy('created_at', 'DESC')->get(),
        ]);
    }

    public function contacts()
    {
        return view('contacts', [
            'services' => Service::orderBy('created_at', 'ASC')->get(),
        ]);
    }

    public function profile()
    {
        return view('User.profile', [
            'user' => Auth::user(),
        ]);
    }

    public function booking()
    {
        return response()->redirectTo(route('contacts') . "#price-calc-section");
    }
}
