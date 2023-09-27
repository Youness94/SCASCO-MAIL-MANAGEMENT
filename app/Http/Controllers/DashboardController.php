<?php

namespace App\Http\Controllers;

use App\Models\Production;
use App\Models\Sinistre;
use App\Models\SinistreDim;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function DashboardIndex()
    {
        $totalProduction = Production::count() ; 
        $totalSinistreDim = SinistreDim::count() ;
        $totalSinistreAt_Rd = Sinistre::count() ;

        return view('admin.index', compact('totalProduction', 'totalSinistreDim', 'totalSinistreAt_Rd'));
    }
    
}
