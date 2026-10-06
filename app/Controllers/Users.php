<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $users = [
            [
                'username' => 'admin01',
                'full_name' => 'Mark Administrator',
                'role' => 'Administrator',
            ],
            [
                'username' => 'cashier01',
                'full_name' => 'Anna Lopez',
                'role' => 'Cashier',
            ],
            [
                'username' => 'cashier02',
                'full_name' => 'Joshua Cruz',
                'role' => 'Cashier',
            ],
            [
                'username' => 'manager01',
                'full_name' => 'Sofia Ramos',
                'role' => 'Manager',
            ],
            [
                'username' => 'staff01',
                'full_name' => 'Daniel Flores',
                'role' => 'Staff',
            ],
        ];

        $data = [
            'users' => $users,
        ];

        return view('users', $data);
    }
}