<?php

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Filippo',
            'email' => 'filippo@gmail.com',
            'password' => Hash::make('filippo'),
        ]);
    }
}
