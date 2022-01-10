<?php

namespace App\Http\Controllers;

use App\Models\Sector;

class DashboardController
{
    protected $breadcrumb;

    public function __invoke()
    {
        $this->breadcrumb = [
            __('Home') => false,
        ];

        return view('dashboard', [
            'title' => __('Dashboard'),
            'breadcrumb' => $this->breadcrumb,
            'activeRoute' => route('dashboard')
        ]);
    }

    public function index()
    {
        $this->breadcrumb = [
            __('Home') => false,
        ];

        return view('dashboard', [
            'title' => __('Dashboard'),
            'breadcrumb' => $this->breadcrumb,
            'activeRoute' => route('dashboard')
        ]);
    }
}
