<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Option;
use App\Models\Sector;
use App\Models\Service;
use App\Models\ServiceTransection;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ServiceController extends Controller
{

    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
        $this->activeRoute = route('services.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!can('show_services')) {
            return unauthorized();
        }

        $this->breadcrumb = [
            __('Home') => route('dashboard'),
            __('Services') => false,
        ];
        $services = DB::table('v_service_details')->whereNull('deleted_at')->count();
        $trash = DB::table('v_service_details')->whereNotNull('deleted_at')->count();

        return view('services.index', [
            'title' => __('Services'),
            'breadcrumb' => $this->breadcrumb,
            'activeRoute' => $this->activeRoute,
            'users' => $services,
            'trash' => $trash
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!can('create_services')) {
            return unauthorized();
        }

        $this->breadcrumb = [
            __('Home') => route('dashboard'),
            __('Services') => route('services.create'),
            __('Create') => false
        ];

        return view('services.create', [
            'service' => $this->service,
            'title' => __('Services'),
            'breadcrumb' => $this->breadcrumb,
            'activeRoute' => $this->activeRoute
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!can('edit_services')) {
            return unauthorized();
        }

        $this->breadcrumb = [
            __('Home') => route('dashboard'),
            __('Services') => route('services.edit', $id),
            __('Edit') => false
        ];

        return view('services.edit', [
            'service' => $id,
            'title' => __('Services'),
            'breadcrumb' => $this->breadcrumb,
            'activeRoute' => $this->activeRoute
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $query = ServiceTransection::find($id);

        if ($query->id === auth()->id()) {
            return ['error' => true, 'message' => __('Fail Delete')];
        }

        if ($query->delete()) {
            return ['error' => false, 'message' => __('Deleted')];
        }

        return ['error' => true, 'message' => __('Fail Delete')];

    }

    public function dataTable()
    {
        $query = DB::table('v_service_details')->whereNull('deleted_at')->orderByDesc('date_out')->get();

        if (!empty(\request('trash'))) {
            $query = DB::table('v_service_details')->whereNotNull('deleted_at')->orderByDesc('date_out')->get();
        }

        return DataTables::of($query)
            ->editColumn('action', function ($model) {
                return view('services.inc.actions', [
                    'service' => $model
                ]);
            })
            ->make(true);
    }

    public function printLic($id)
    {
        $tran = ServiceTransection::find($id);

        $ser = Service::find($tran->service_id);
        $ser_type = $ser->service_type()->first();
        $com2 = $ser->commune()->first();
        $vil2 = $ser->village()->first();

        $cus = Customer::find($ser->customer_id);
        $op = Option::all();
        $sec = Sector::find($ser_type->sector_id);


        return view("services.l$ser->sector_id")->with([
            'tran' => $tran,
            'cus' => $cus,
            'ser' => $ser,
            'ser_type' => $ser_type,
            'com2' => $com2,
            'vil2' => $vil2,
            'pro' => $op[0]['name'],
            'dis' => $op[1]['name'],
            'sec' => $sec

        ]);

    }

}
