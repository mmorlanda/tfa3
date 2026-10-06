<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index()
    {
        $customers = [
            [
                'full_name' => 'Juan Dela Cruz',
                'email' => 'juan@email.com',
                'phone' => '09123456789',
            ],
            [
                'full_name' => 'Maria Santos',
                'email' => 'maria@email.com',
                'phone' => '09234567890',
            ],
            [
                'full_name' => 'Carlo Reyes',
                'email' => 'carlo@email.com',
                'phone' => '09345678901',
            ],
            [
                'full_name' => 'Angela Garcia',
                'email' => 'angela@email.com',
                'phone' => '09456789012',
            ],
            [
                'full_name' => 'Paolo Mendoza',
                'email' => 'paolo@email.com',
                'phone' => '09567890123',
            ],
        ];

        $data = [
            'customers' => $customers,
        ];

        return view('customers', $data);
    }
}