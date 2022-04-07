<?php

namespace App\Http\Livewire;

use App\Models\Commune;
use App\Models\Customer;
use App\Models\District;
use App\Models\Province;
use App\Models\Sector;
use App\Models\Service;
use App\Models\ServiceTransection;
use App\Models\ServiceType;
use App\Models\Village;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ServiceEdit extends Component
{

    public $sector_id,
        $service_type_id,
        $business_type,
        $brand_namekh,
        $brand_nameen,
        $commune_id,
        $village_id,
        $street,
        $group,
        $locate,
        $home,
        $phone;

    public $customer_namekh,
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
        $customer_new=0,
        $gender, $dob, $national_id, $national = 'ខ្មែរ';

    public $tran_id,
        $service_id,
        $amount,
        $barcode,
        $customer_id,
        $search_customer = '';

    public function mount($service){
        $this->tran_id = $service;
        $ser = ServiceTransection::join('services','service_id','=','services.id')
                    ->where('service_transections.id', '=', $this->tran_id)
                    ->first();
        $this->service_id = $ser->service_id;
        $this->barcode = $ser->barcode;
        $this->amount = $ser->amount;
        $this->service_type_id = $ser->service_type_id;
        $this->sector_id = $ser->sector_id;
        $this->brand_namekh = $ser->brand_namekh;
        $this->brand_nameen = $ser->brand_nameen;
        $this->business_type = $ser->business_type;
        $this->phone = $ser->phone;
        $this->home = $ser->home;
        $this->group = $ser->group;
        $this->street = $ser->street;
        $this->locate = $ser->locate;
        $this->village_id = $ser->village_id;
        $this->commune_id = $ser->commune_id;
        $this->customer_id = $ser->customer_id;
        $this->search_customer = Customer::find($ser->customer_id)->namekh;

    }

    public function selectCustomer($id, $cusname){

        $this->search_customer = $cusname;
        $this->customer_id = $id;

    }

    public function save()
    {

        if($this->customer_new == 0){

            $this->validate([
                    'service_type_id' => 'required',
                    'village_id' => 'required',
                ]);

            $this->updateServiceAndTransection();

        }else{

            $this->validate([
                    'service_type_id' => 'required',
                    'village_id' => 'required',
                    'customer_namekh' => 'required',
                    'customer_village' => 'required',
                ]);

            $this->insertCustomer();
            $this->updateServiceAndTransection();

            return redirect(request()->header('Referer'));
        }

    }

    public function clear(){

        return redirect('services');

    }

    public function render()
    {
        $sec = Sector::all();
        $ser_type = ServiceType::where('sector_id', '=', $this->sector_id)->get();

        $pro = Province::all();
        $dis = District::where('province_id', '=', $this->customer_province)->get();
        $com = Commune::where('district_id', '=', $this->customer_district)->get();
        $vil = Village::where('commune_id', '=', $this->customer_commune)->get();

        $com2 = Commune::where('district_id', '=', 203)->get();
        $vil2 = Village::where('commune_id', '=', $this->commune_id)->get();

        $pattern = '%' . $this->search_customer . '%';

        if(!empty($this->search_customer)){
            $querycus = Customer::where('namekh', 'LIKE', $pattern)->get();
        }else{
            $querycus = [];
        }

        return view('livewire.service-edit')->with([
            'sectors' => $sec,
            'service_types' => $ser_type,
            'customer_provinces' => $pro,
            'customer_districts' => $dis,
            'customer_communes' => $com,
            'customer_villages' => $vil,
            'communes' => $com2,
            'villages' => $vil2,
            'cusdata' => $querycus,
        ]);
    }


    public function updateServiceAndTransection(){

        $service = Service::find($this->service_id);
        $service->customer_id = $this->customer_id;
        $service->service_type_id = $this->service_type_id;
        $service->sector_id = $this->sector_id;
        $service->brand_namekh = $this->brand_namekh;
        $service->brand_nameen = $this->brand_nameen;
        $service->business_type = $this->business_type;
        $service->phone = $this->phone;
        $service->home = $this->home;
        $service->group = $this->group;
        $service->street = $this->street;
        $service->locate = $this->locate;
        $service->village_id = $this->village_id;
        $service->commune_id = $this->commune_id;
        $service->save();

        $st = ServiceTransection::find($this->tran_id);
        $st->service_id = $this->service_id;
        $st->barcode = $this->barcode;
        $st->amount = $this->amount;
        $st->save();

    }

    public function insertCustomer(){
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
        $this->customer_id = $customer->id;
    }

}
