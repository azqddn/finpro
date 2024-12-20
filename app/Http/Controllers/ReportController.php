<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function displayReport(){
        return view('ManageReportView.owner.reportList');
    }

    public function createReport(){
        return view('ManageReportView.owner.createReport');
    }
}
