<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Неизвестный пользователь',
                'email' => 'unknowuser@1.ru',
                'password' => bcrypt(Str::random(16)),
                'role' => 'Подписчик',
            ],[
                'name' => 'Автор',
                'email' => 'ilya.otinov@gmail.com',
                'password' => bcrypt('Ilya372317'),
                'role' => 'Администратор',
            ]
        ];

        DB::table('users')->insert($data);
    }
}
