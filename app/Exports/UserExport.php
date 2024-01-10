<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::select('name', 'username', 'address', 'no_hp', 'email')->get();
    }

    public function headings(): array
    {
        return [
            'Name',
            'Username',
            'Address',
            'Handphone Number',
            'Email'
        ];
    }

}