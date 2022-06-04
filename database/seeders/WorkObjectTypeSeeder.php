<?php

namespace Database\Seeders;

use App\Models\WorkObjectType;
use Illuminate\Database\Seeder;

class WorkObjectTypeSeeder extends Seeder
{
    private $rows = [
        [ 'title' => 'Видео' ],
        [ 'title' => 'Фото' ],
    ];

    public function run()
    {
        foreach($this->rows as $r) (new WorkObjectType($r))->save();
    }
}
