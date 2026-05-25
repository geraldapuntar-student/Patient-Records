<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Patient;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers    = User::count();
        $totalPatients = Patient::count();

        return view('dashboard', compact('totalUsers', 'totalPatients'));
    }
}