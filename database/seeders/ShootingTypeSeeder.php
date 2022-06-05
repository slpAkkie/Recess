<?php

namespace Database\Seeders;

use App\Models\ShootingType;
use Illuminate\Database\Seeder;

class ShootingTypeSeeder extends Seeder
{
    private $rows = [
        [ 'title' => 'Коммерческая съемка' ],
        [ 'title' => 'Студийная съемка' ],
        [ 'title' => 'Love Story' ],
        [ 'title' => 'Прогулочная съемка' ],
    ];

    public function run()
    {
        foreach($this->rows as $r) (new ShootingType($r))->save();
    }
}
