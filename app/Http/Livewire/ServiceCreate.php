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

class ServiceCreate extends Component
{

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

    public $sector_id, $new=0,
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

    public $amount, $barcode;

    public $service_id, $customer_id, $search_customer = '', $search_string = '';


    public function selectService($serid, $name){

        $this->search_string = $name;
        $this->service_id = $serid;

    }

    public function selectCustomer($id, $cusname){

        $this->search_customer = $cusname;
        $this->customer_id = $id;

    }

    public function save()
    {
        if($this->new == 0){
            $this->validate([
                'barcode' => 'required',
            ]);

            $this->insertServiceTransection();

        }else{
            if($this->customer_new == 0){

                $this->validate([
                    'barcode' => 'required',
                    'service_type_id' => 'required',
                    'village_id' => 'required',
                ]);

                $this->insertService();
                $this->insertServiceTransection();

            }else{

                $this->validate([
                    'barcode' => 'required',
                    'service_type_id' => 'required',
                    'village_id' => 'required',
                    'customer_namekh' => 'required',
                    'customer_village' => 'required',
                ]);

                $this->insertCustomer();
                $this->insertService();
                $this->insertServiceTransection();
            }
        }

        $this->reset();
    }

    public function clear(){
        $this->reset();
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

        $pattern = '%' . $this->search_string . '%';

        if(!empty($this->search_string)){
            $query = DB::table('v_service_details')->where('namekh', 'LIKE', $pattern)->whereNull('deleted_at')->get();
        }else{
            $query = [];
        }

        $pattern = '%' . $this->search_customer . '%';

        if(!empty($this->search_customer)){
            $querycus = Customer::where('namekh', 'LIKE', $pattern)->get();
        }else{
            $querycus = [];
        }

        return view('livewire.service-create')->with([
            'sectors' => $sec,
            'service_types' => $ser_type,
            'customer_provinces' => $pro,
            'customer_districts' => $dis,
            'customer_communes' => $com,
            'customer_villages' => $vil,
            'communes' => $com2,
            'villages' => $vil2,
            'data' => $query,
            'cusdata' => $querycus,
        ]);
    }

    public function insertServiceTransection(){

        $st = new ServiceTransection();
        $st->service_id = $this->service_id;
        $st->date_in = $this->date_in;
        $st->date_out = $this->date_out;
        $st->letter_number = $this->letter_number;
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

    public function insertService(){
        $service = new Service();
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
        $this->service_id = $service->id;
    }
}
