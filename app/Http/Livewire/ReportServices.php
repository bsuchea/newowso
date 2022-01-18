<?php

namespace App\Http\Livewire;

use App\Models\Sector;
use App\Exports\ServiceExport;
use App\Models\ServiceType;
use App\Models\VServiceDetail;
use App\Models\VServiceExport;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class ReportServices extends Component
{
    public $sector_id = 1, $i = 1;
    public $fromdate;
    public $todate;
    public $query;

    public function mount()
    {
        $this->fromdate = Carbon::now()->subMonth(1)->format('Y-m-d');
        $this->todate = Carbon::now()->format('Y-m-d');
    }

    public function render()
    {
        $sec = Sector::all();

        $this->query = VServiceExport::query()
            ->whereBetween('date_out', [$this->fromdate, $this->todate])
            ->where('sector_id', '=', $this->sector_id)
            ->whereNotNull('deleted_at' )
            ->get();

        return view('livewire.report-services', [
            'sectors' => $sec,
            'query' => $this->query
        ]);
    }

    public function export()
    {
        return (new ServiceExport($this->sector_id, $this->fromdate, $this->todate))->download('Monthly Report.xlsx');
    }
}
