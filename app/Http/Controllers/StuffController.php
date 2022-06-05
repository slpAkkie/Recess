<?php

namespace App\Http\Controllers;

use App\Http\Requests\StuffRequest;
use App\Models\Stuff;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class StuffController extends Controller
{
    public function show(Stuff $stuff)
    {
        return view('Admin.Stuff.show', [
            'stuff' => $stuff,
        ]);
    }

    public function create()
    {
        return view('Admin.Stuff.create');
    }

    public function store(StuffRequest $stuffRequest)
    {
        if ($stuffRequest->has('avatar'))
            $stuffRequest->merge([
                'avatar_path' => 'storage/' . Storage::disk('public')->put('stuff', $stuffRequest->file('avatar')),
            ]);

        $stuff = new Stuff($stuffRequest->only([
            'full_name',
            'position',
            'description',
            'avatar_path',
        ]));

        $stuff->save();

        return response()->redirectToRoute('stuff.show', [
            'stuff' => $stuff,
        ]);
    }

    private function removeAvatar(Stuff $stuff)
    {
        if (!$stuff->avatar_path) return false;

        unlink(public_path($stuff->avatar_path));
        $stuff->avatar_path = null;

        return true;
    }

    public function destroyAvatar(Stuff $stuff)
    {
        if ($this->removeAvatar($stuff))
            $stuff->save();

        return response()->redirectToRoute('stuff.show', [
            'stuff' => $stuff,
        ]);
    }

    public function edit(Stuff $stuff)
    {
        return view('Admin.Stuff.edit', [
            'stuff' => $stuff,
        ]);
    }

    public function update(StuffRequest $stuffRequest, Stuff $stuff)
    {
        if ($stuffRequest->has('avatar')) {

            $this->removeAvatar($stuff);

            $stuffRequest->merge([
                'avatar_path' => 'storage/' . Storage::disk('public')->put('stuff', $stuffRequest->file('avatar')),
            ]);
        }

        $stuff->update(array_filter($stuffRequest->only([
            'full_name',
            'position',
            'description',
            'avatar_path',
        ])));

        if ($stuffRequest->get('description') === null) {
            $stuff->description = null;
            $stuff->save();
        }

        return response()->redirectToRoute('stuff.show', [
            'stuff' => $stuff,
        ]);
    }

    public function destroy(Stuff $stuff)
    {
        $this->removeAvatar($stuff);
        $stuff->delete();
        return response()->redirectToRoute('admin.stuff.index');
    }
}
