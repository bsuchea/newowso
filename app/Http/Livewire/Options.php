<?php

namespace App\Http\Livewire;

use App\Models\Option;
use Livewire\Component;
use App\Models\Province;
use App\Models\District;

class Options extends Component
{
    public $pro, $dis;

    public function mount(){
        $this->pro = Option::find(1)->value;
        $this->dis = Option::find(2)->value;
    }

    public function render()
    {

        $provinces = Province::all();
        $districts = District::where('province_id', '=', $this->pro)->get();

        return view('livewire.options', compact('provinces', 'districts'));
    }

    public function save(){

        $prov = Province::find($this->pro);
        $dist = District::find($this->dis);

        $p = Option::find(1);
        $p->value = $prov->id;
        $p->name = $prov->type.$prov->namekh;
        $p->save();

        $d = Option::find(2);
        $d->value = $dist->id;
        $d->name = $dist->type.$dist->namekh;
        $d->save();
    }
}
