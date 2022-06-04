<?php

namespace App\Http\Controllers;

use App\Models\Service;

class AdminController extends Controller
{
    public function indexServices() {
        return view('Admin.Service.index', [
            'services' => Service::all(),
        ]);
    }

    public function indexWorks() {
        return view('Admin.Work.index');
    }

    public function indexBookings()
    {
        return view('Admin.Booking.index');
    }
}
