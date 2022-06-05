<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkRequest;
use App\Models\ShootingType;
use App\Models\Work;
use Illuminate\Support\Facades\File;

class WorkController extends Controller
{
    public function show(Work $work)
    {
        return view('Admin.Work.show', [
            'work' => $work,
        ]);
    }

    public function create()
    {
        return view('Admin.Work.create', [
            'types' => ShootingType::all(),
        ]);
    }

    public function store(WorkRequest $workRequest)
    {
        $work = new Work($workRequest->only([
            'title',
            'type_id',
            'country',
            'city',
            'shooted_at',
        ]));

        $work->save();

        return response()->redirectToRoute('admin.works.show', [
            'work' => $work,
        ]);
    }

    public function edit(Work $work)
    {
        return view('Admin.Work.edit', [
            'types' => ShootingType::all(),
            'work' => $work,
        ]);
    }

    public function update(WorkRequest $workRequest, Work $work)
    {

        $work->update($workRequest->only([
            'title',
            'type_id',
            'country',
            'city',
            'shooted_at',
        ]));

        return response()->redirectToRoute('admin.works.show', [
            'work' => $work,
        ]);
    }

    public function destroy(Work $work)
    {
        File::deleteDirectory(public_path('storage/works/' . $work->id));
        $work->delete();

        return response()->redirectToRoute('admin.works.index');
    }
}
