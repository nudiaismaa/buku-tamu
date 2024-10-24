<?php

namespace App\Exports;

use App\Models\Guest;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GuestsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Guest::select('id', 'visit_datetime', 'name', 'mobile_no', 'institutions', 'address', 'necessity', 'photo', 'signature', 'created_at', 'updated_at')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Visit DateTime',
            'Name',
            'Mobile No',
            'Institutions',
            'Address',
            'Necessity',
            'Photo',
            'Signature',
            'Created At',
            'Updated At'
        ];
    }
}
