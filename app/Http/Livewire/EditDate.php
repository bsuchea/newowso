<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sector;
use App\Models\Option;

class EditDate extends Component
{
    public $sectors;
//    public $datekh1, $date1,
//            $datekh2, $date2,
//            $datekh3, $date3,
//            $datekh4, $date4,
//            $datekh5, $date5;

    protected $rules = [
        'sectors.*.lunar_date' => 'required',
        'sectors.*.date' => 'required',
    ];
    public function mount(){

        $this->sectors = Sector::all();

//        $op = Sector::all();
//        $this->datekh1 = $op[0]['lunar_date'];
//        $this->date1 = $op[0]['date'];
//
//        $this->datekh2 = $op[1]['lunar_date'];
//        $this->date2 = $op[1]['date'];
//
//        $this->datekh3 = $op[2]['lunar_date'];
//        $this->date3 = $op[2]['date'];
//
//        $this->datekh4 = $op[3]['lunar_date'];
//        $this->date4 = $op[3]['date'];
//
//        $this->datekh5 = $op[4]['lunar_date'];
//        $this->date5 = $op[4]['date'];
    }

    public function render()
    {

        return view('livewire.edit-date');
    }

    protected $listeners = ['msg' => 'save'];

    public function save(){

        $this->validate();

        foreach ($this->sectors as $sector) {
            $sector->save();
        }

//        $this->dispatchBrowserEvent('msg');

    }
}
