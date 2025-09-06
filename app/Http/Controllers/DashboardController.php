<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //  public function executiveDashboard() {
    //     return view('backend.dashboard', ['data' => $todos]);
    // }
     public function executiveDashboard()
    {
        $todos = Todo::all();
        return view('backend.dashboard', ['data' => $todos]);
    }

    public function internDashboard() {
         $todos = Todo::all();
        return view('dashboard.intern',['data' => $todos]);
    }
}
