<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Work;

class AdminController extends Controller
{
    public function indexServices() {
        return view('Admin.Service.index', [
            'services' => Service::all(),
        ]);
    }

    public function indexWorks() {
        return view('Admin.Work.index', [
            'works' => Work::all(),
        ]);
    }

    public function indexBookings()
    {
        return view('Admin.Booking.index');
    }
}
