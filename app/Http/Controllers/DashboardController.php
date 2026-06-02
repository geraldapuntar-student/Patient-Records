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
        $activePatients    = Patient::where('status', 'Active')->count();
        $dischargedPatients = Patient::where('status', 'Discharged')->count();
        $criticalPatients  = Patient::where('status', 'Critical')->count();

        // Gender breakdown
        $malePatients   = Patient::where('gender', 'Male')->count();
        $femalePatients = Patient::where('gender', 'Female')->count();

        // Monthly admissions (current year)
        $monthlyAdmissions = Patient::selectRaw('MONTH(admission_date) as month, COUNT(*) as count')
            ->whereYear('admission_date', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Fill missing months with 0
        $admissionsData = [];
        for ($i = 1; $i <= 12; $i++) {
            $admissionsData[] = $monthlyAdmissions[$i] ?? 0;
        }

        return view('dashboard', compact(
            'totalUsers',
            'totalPatients',
            'activePatients',
            'dischargedPatients',
            'criticalPatients',
            'malePatients',
            'femalePatients',
            'admissionsData'
        ));
    }
}