<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\WorkObject;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class WorkObjectController extends Controller
{
    private $workObjectsPath = '/storage/app/public/works/';

    static $photoExts = [
        'jpg',
        'jpeg',
        'png',
    ];
    static $videoExts = [
        'mp4',
        'avi',
        'mov',
    ];

    public function uploadHandler(Request $request, Work $work)
    {
        $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

        if ($receiver->isUploaded() === false) {
            throw new UploadMissingFileException();
        }

        $save = $receiver->receive();

        if ($save->isFinished()) {
            $work_object = $this->saveFile($save->getFile(), $request, $work);
            $work->objects()->create([
                'path' => "/storage/works/{$work->id}/{$work_object['name']}",
                'type_id' => $work_object['type_id'],
            ]);

            return response()->json('Uploaded');
        }

        /** @var AbstractHandler $handler */
        $handler = $save->handler();

        return response()->json([
            'done' => $handler->getPercentageDone(),
            'status' => true
        ]);
    }

    private function getFileType($ext)
    {
        if (in_array($ext, static::$videoExts)) return 1;

        return 2;
    }

    private function getUploadPath(Work $work)
    {
        return $this->workObjectsPath . $work->id . '/';
    }

    private function saveFile(UploadedFile $file, Request $request, Work $work)
    {
        $ext = $file->getClientOriginalExtension();
        $currentTime = Carbon::now()->unix();
        $randomSlug = \Illuminate\Support\Str::random(8);
        $fileName = "{$currentTime}{$randomSlug}.{$ext}";
        $file->move($_SERVER['DOCUMENT_ROOT'] . $this->getUploadPath($work), $fileName);

        $filePath = $this->getUploadPath($work) . $fileName;

        return [
            'path' => $filePath,
            'name' => $fileName,
            'type_id' => $this->getFileType($ext),
        ];
    }

    public function destroy(Work $work, WorkObject $work_object)
    {
        if ($work->id === $work_object->work_id) {
            if (file_exists(public_path($work_object->path)))
                unlink(public_path($work_object->path));
            $work_object->delete();
        }

        return Redirect::back();
    }
}
