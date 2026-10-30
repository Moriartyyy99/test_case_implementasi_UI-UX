<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Fajri Nugroho',
                'email' => 'admin@gmail.com',
                'password' => 'admin123',
                'role' => 'owner',
            ],
            [
                'name' => 'Siti Amanada',
                'email' => 'manager@gmail.com',
                'password' => 'manager123',
                'role' => 'manager',
            ],
            [
                'name' => 'Rina Marliana',
                'email' => 'finance@gmail.com',
                'password' => 'finance123',
                'role' => 'finance',
            ],
            [
                'name' => 'Andi Rahman',
                'email' => 'staff@gmail.com',
                'password' => 'staff123',
                'role' => 'staff',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name' => $user['name'],
                    'company_name' => 'NexxManage',
                    'role' => $user['role'],
                    'password' => $user['password'],
                ]
            );
        }
    }
}