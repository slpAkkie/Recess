<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        (new User([
            'full_name' => 'Гаврилова Алена',
            'login' => 'root',
            'email' => 'root@akkie.cyou',
            'phone' => '80000000000',
            'password' => 'root',
        ]))->save();



        $user = new User([
            'full_name' => 'Калошин Максим',
            'login' => 'admin',
            'email' => 'admin@akkie.cyou',
            'phone' => '71234567890',
            'password' => 'admin',
        ]);
        $user->is_admin = 1;

        $user->save();

    }
}
