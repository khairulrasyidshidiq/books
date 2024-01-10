<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class BookExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Book::select('id', 'title', 'writer', 'publisher', 'isbn', 'category_id')->get();
    }

    public function headings(): array
    {
        return [
            'Book ID',
            'Title',
            'Writer',
            'Publisher',
            'ISBN',
            'category_id'
        ];
    }

}