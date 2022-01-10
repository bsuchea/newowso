<?php

namespace App\Http\Livewire;

use App\Models\Commune;
use App\Models\District;
use App\Models\Province;
use App\Models\Village;
use Livewire\Component;
use App\Models\Customer;

class CustomerEdit extends Component
{

    public $customer_id,
        $customer_namekh,
        $customer_nameen,
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

    public function mount($cusid){
        $this->customer_id = $cusid;
        $cus = Customer::find($this->customer_id);
        $this->customer_namekh = $cus->namekh;
        $this->customer_nameen = $cus->nameen;
        $this->gender = $cus->gender;
        $this->dob = $cus->dob;
        $this->customer_phone = $cus->phone;
        $this->national = $cus->national;
        $this->national_id = $cus->national_id;
        $this->customer_email = $cus->email;
        $this->customer_home = $cus->home;
        $this->customer_group = $cus->group;
        $this->customer_street = $cus->street;
        $this->customer_village = $cus->village_id;
        $this->customer_commune = $cus->commune_id;
        $this->customer_district = $cus->district_id;
        $this->customer_province = $cus->province_id;
    }

    public function render()
    {
        $pro = Province::all();
        $dis = District::where('province_id', '=', $this->customer_province)->get();
        $com = Commune::where('district_id', '=', $this->customer_district)->get();
        $vil = Village::where('commune_id', '=', $this->customer_commune)->get();

        return view('livewire.customer-edit')->with([
            'customer_provinces' => $pro,
            'customer_districts' => $dis,
            'customer_communes' => $com,
            'customer_villages' => $vil,
        ]);
    }

    public function save(){

        $this->validate([
            'customer_namekh' => 'required',
            'customer_village' => 'required',
        ]);

        $customer = Customer::find($this->customer_id);
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

    }

    public function clear(){
        $this->redirect('/customers');
    }
}
