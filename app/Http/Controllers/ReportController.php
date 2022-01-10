<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function service(){

        $this->breadcrumb = [
            __('Report') => false,
        ];

        return view('report.services', [
            'title' => __('Report'),
            'breadcrumb' => $this->breadcrumb,
            'activeRoute' => route('report.services')
        ]);

    }

}
