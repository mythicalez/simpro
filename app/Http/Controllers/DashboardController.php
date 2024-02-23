<?php

namespace App\Http\Controllers;

use App\Models\Partlist;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $partlist = Partlist::get();

        return view('dashboard.dashboard', compact('partlist'));
    }
}
