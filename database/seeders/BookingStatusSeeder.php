<?php

namespace Database\Seeders;

use App\Models\BookingStatus;
use Illuminate\Database\Seeder;

class BookingStatusSeeder extends Seeder
{
    private $rows = [
        [ 'title' => 'Не подтверждено' ],
        [ 'title' => 'Подтверждено' ],
        [ 'title' => 'Звершено' ],
    ];

    public function run()
    {
        foreach($this->rows as $r) (new BookingStatus($r))->save();
    }
}
