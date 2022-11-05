<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'=>'isUser',
                'username'=>'isUser',
                'email'=>'zaq@zaq',
                'name'=>bcrypt('12345'),
                'roles_id'=>2
            ],
            [
                'name'=>'isAdmin',
                'username'=>'isAdmin',
                'email'=>'zaq@zaqi',
                'name'=>bcrypt('12345'),
                'roles_id'=>1
            ],

        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
