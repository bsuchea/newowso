<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{

    protected $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
        $this->activeRoute = route('customers.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! can('show_customers')) {
            return unauthorized();
        }

        $this->breadcrumb = [
            __('Home') => route('dashboard'),
            __('Customers') => false,
        ];
        $data = Customer::count();
        $trash = Customer::onlyTrashed()->count();

        return view('customers.index', [
            'title' => __('Customer'),
            'breadcrumb' => $this->breadcrumb,
            'activeRoute' => $this->activeRoute,
            'data' => $data,
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
        if (! can('show_customers')) {
            return unauthorized();
        }

        $this->breadcrumb = [
            __('Home') => route('dashboard'),
            __('Customers') => false,
        ];

        return view('customers.create', [
            'title' => __('Customer'),
            'breadcrumb' => $this->breadcrumb,
            'activeRoute' => $this->activeRoute
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! can('edit_customers')) {
            return unauthorized();
        }

        $this->breadcrumb = [
            __('Home') => route('dashboard'),
            __('Customers') => false,
        ];

        return view('customers.edit', [
            'title' => __('Customer'),
            'breadcrumb' => $this->breadcrumb,
            'activeRoute' => $this->activeRoute,
            'cusid' => $id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::destroy($id);
    }

    public function dataTable()
    {
        $query = Customer::query()->orderByDesc('id');

        if (!empty(\request('trash'))) {
            $query->onlyTrashed();
        }

        return DataTables::of($query)
            ->editColumn('action', function ($model) {
                return view('customers.inc.actions', [
                    'customer' => $model
                ]);
            })
            ->make(true);
    }
}
