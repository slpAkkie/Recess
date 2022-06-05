<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Models\Stuff;
use App\Models\Work;
use Illuminate\Support\Carbon;

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
        return view('Admin.Booking.index', [
            'bookings' => Booking::where('created_at', '>', Carbon::now()->addDays(-31)->format('YmdHis'))->get(),
        ]);
    }

    public function indexStuff() {
        return view('Admin.Stuff.index', [
            'stuff' => Stuff::all(),
        ]);
    }
}
