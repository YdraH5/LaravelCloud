<?php
namespace App\Imports;

use App\Models\Tenant;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Hash;

class TenantsImport implements Tenants, WithHeadingRow
{
    public function model(array $row)
    {
        return new Tenants([
            'name'  => $row['name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
        ]);
    }
}

