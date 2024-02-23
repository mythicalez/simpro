<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $title = 'DSS-SimPro';

        return view('index', [
            'title' => 'DSS - SimPro'
        ]);
    }

    public function about()
    {
        return view('about', [
            'title' => 'Tentang - SimPro'
        ]);
    }
}
