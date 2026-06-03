<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $normalUser = User::updateOrCreate(
            ['email' => 'user@mysite.com'],
            [
                'name' => 'Standart Müşteri',
                'password' => Hash::make('12345'),
            ]
        );

        $userRole = Role::where('name', 'user')->first();

        $normalUser->roles()->syncWithoutDetaching([
            $userRole->id,
        ]);
    }
}
