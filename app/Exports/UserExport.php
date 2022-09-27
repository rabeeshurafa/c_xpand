<?php

namespace App\Exports;

use App\Http\Controllers\Controller;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithProperties;

class UserExport extends Controller implements FromCollection, WithColumnFormatting, WithMapping, WithProperties, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $items = User::orderByDesc('created_at')->get();

        return $items;
    }

    public function columnFormats(): array
    {
        // TODO: Implement columnFormats() method.
        return [];
    }

    public function map($row): array
    {
        return [
            $row['name']
        ];
    }

    public function properties(): array
    {
        return [
            'creator' => 'moatadil',
            'lastModifiedBy' => now()->format('Y-m-d h:i A'),
            'title' => 'سجل المستخدمين',
            'description' => 'سجل المستخدمين' . now()->format('Y-m-d') . rand(111, 9999),
            'subject' => 'expand',
            'keywords' => 'expand',
            'category' => 'Users',
            'manager' => 'expand',
            'company' => 'expand',
        ];
    }

    public function headings(): array
    {
        return [
            'name',
        ];
    }
}
