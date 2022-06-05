<?php

namespace Database\Seeders;

use App\Models\BookingStatus;
use Illuminate\Database\Seeder;

class BookingStatusSeeder extends Seeder
{
    private $rows = [
        [ 'title' => 'Не подтверждено' ],
        [ 'title' => 'Подтверждено' ],
        [ 'title' => 'Выполнено' ],
        [ 'title' => 'Отменено администратором' ],
    ];

    public function run()
    {
        foreach($this->rows as $r) (new BookingStatus($r))->save();
    }
}
