<?php

namespace App\Http\Livewire;

use App\Models\Commune;
use App\Models\District;
use App\Models\Province;
use App\Models\Village;
use Livewire\Component;
use App\Models\Customer;

class CustomerCreate extends Component
{
    public $customer_namekh, $customer_nameen,
    $customer_province,
    $customer_district,
    $customer_commune,
    $customer_village,
    $customer_street,
    $customer_group,
    $customer_home,
    $customer_phone,
    $customer_email,
    $gender, $dob, $national_id, $national = 'ខ្មែរ';

    public function render()
    {

        $pro = Province::all();
        $dis = District::where('province_id', '=', $this->customer_province)->get();
        $com = Commune::where('district_id', '=', $this->customer_district)->get();
        $vil = Village::where('commune_id', '=', $this->customer_commune)->get();

        return view('livewire.customer-create')->with([
            'customer_provinces' => $pro,
            'customer_districts' => $dis,
            'customer_communes' => $com,
            'customer_villages' => $vil,
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'customer_namekh' => 'required',
            'customer_village' => 'required',
        ]);
    }

    public function save(){

        $this->validate([
            'customer_namekh' => 'required',
            'customer_village' => 'required',
        ]);

        $customer = new Customer();
        $customer->namekh = $this->customer_namekh;
        $customer->nameen = $this->customer_nameen;
        $customer->gender = $this->gender;
        $customer->dob = $this->dob;
        $customer->phone = $this->customer_phone;
        $customer->national = $this->national;
        $customer->national_id = $this->national_id;
        $customer->email = $this->customer_email;
        $customer->home = $this->customer_home;
        $customer->group = $this->customer_group;
        $customer->street = $this->customer_street;
        $customer->village_id = $this->customer_village;
        $customer->commune_id = $this->customer_commune;
        $customer->district_id = $this->customer_district;
        $customer->province_id = $this->customer_province;
        $customer->save();

        $this->reset();
    }

    public function clear(){
        $this->reset();
    }


}
