<?php

namespace Database\Seeders;

use App\Models\ShootingType;
use Illuminate\Database\Seeder;

class ShootingTypeSeeder extends Seeder
{
    private $rows = [
        [ 'title' => 'Коммерческая' ],
        [ 'title' => 'Студийная' ],
        [ 'title' => 'Love Story' ],
        [ 'title' => 'Прогулочная' ],
    ];

    public function run()
    {
        foreach($this->rows as $r) (new ShootingType($r))->save();
    }
}
