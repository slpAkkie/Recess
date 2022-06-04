<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Models\ShootingType;

class ServiceController extends Controller
{
    public function show(Service $service)
    {
        return view('Service.show', [
            'service' => $service,
        ]);
    }

    public function create()
    {
        return view('Admin.Service.create', [
            'types' => ShootingType::all(),
        ]);
    }

    public function store(ServiceRequest $serviceRequest)
    {
        $service = new Service($serviceRequest->only([
            'title',
            'price_per_hour',
            'description',
            'type_id',
        ]));

        $service->save();

        return response()->redirectToRoute('services.show', [
            'service' => $service->id,
        ]);
    }

    public function edit(Service $service)
    {
        return view('Admin.Service.edit', [
            'service' => $service,
            'types' => ShootingType::all(),
        ]);
    }

    public function update(ServiceRequest $serviceRequest, Service $service)
    {
        $service->update($serviceRequest->only([
            'title',
            'price_per_hour',
            'description',
            'type_id',
        ]));

        return response()->redirectToRoute('services.show', [
            'service' => $service->id,
        ]);
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return response()->redirectToRoute('admin.services.index');
    }

    public function book(int $service_id)
    {
        return response()->redirectTo(route('contacts', [
            'service_id' => $service_id,
        ]) . "#price-calculator");
    }
}
