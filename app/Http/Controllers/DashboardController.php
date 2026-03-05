<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Mostrar dashboard
     */
    public function index()
    {
        return view('dashboard');
    }
}