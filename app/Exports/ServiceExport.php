<?php

namespace App\Exports;

use App\Models\VServiceDetail;
use App\Models\VServiceExport;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ServiceExport implements FromQuery, WithHeadings
{
    use Exportable;

    protected $sector_id, $fromdate, $todate;

    public function headings(): array
    {
        return [
            'លេខលិខិត',
            'ឈ្មោះអាជីវករ',
            'ភេទ',
            'នាមករណ៍',
            'ប្រភេទអាជីវកម្ម',
            'ភូមិ',
            'សង្កាត់',
            'សេវាកម្ម',
            'ថ្ងៃទីលិខិតចេញ',
            'លេខទូរស័ព្ទ',
            '',
        ];
    }

    public function __construct($sector_id, $fromdate, $todate)
    {
        $this->sector_id = $sector_id;
        $this->fromdate = $fromdate;
        $this->todate = $todate;
    }

    public function query()
    {
        return VServiceExport::query()
            ->whereBetween('date_out', [$this->fromdate, $this->todate])
            ->where('sector_id', '=', $this->sector_id);
    }
}
