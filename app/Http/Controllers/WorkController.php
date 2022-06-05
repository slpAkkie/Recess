<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkRequest;
use App\Models\Work;

class WorkController extends Controller
{
    public function show(Work $work)
    {
        return view('Work.show', [
            'work' => $work,
        ]);
    }

    public function create()
    {
        dd('create');
    }

    public function store(WorkRequest $workRequest)
    {
        dd('store');
    }

    public function edit(Work $work)
    {
        dd('edit');
    }

    public function update(WorkRequest $workRequest, Work $work)
    {
        dd('update');
    }

    public function destroy(Work $work)
    {
        dd('destroy');
    }
}
