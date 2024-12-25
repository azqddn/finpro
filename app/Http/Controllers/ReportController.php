<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * 
     * 
     * Business Ownerrr
     * 
     * 
     */

    /**
     * Display create report view
     */
    public function createReport(){
        return view('ManageReportView.owner.createReport');
    }

    /**
     * 
     */
    public function generate(Request $request)
    {
        
    }

    /**
     * 
     */
    public function download($fileName)
    {

    }
}
