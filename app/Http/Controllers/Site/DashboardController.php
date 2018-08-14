<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Use Model
Use App\Models\Driver;

class DashboardController extends Controller
{
    public function index(){
        
        $drivers = Driver::with('team')->orderBy('driver.points','DESC')->get();
        return view ('dashboard.index', ['page' => 'dashboard', 'drivers' => $drivers]);
    }
}
