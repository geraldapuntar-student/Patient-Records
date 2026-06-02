<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    // Show Patients Page
    public function index()
    {
        $patients = Patient::where('user_id', Auth::id())->latest()->get();
        return view('patients', compact('patients'));
    }

    // Store New Patient
    public function store(Request $request)
    {
        $request->validate([
            'patient_name'    => 'required|string|max:255',
            'age'             => 'required|integer|min:0|max:150',
            'gender'          => 'required|in:Male,Female',
            'diagnosis'       => 'required|string',
            'doctor_assigned' => 'required|string',
            'status'          => 'required|in:Active,Discharged,Critical',
            'admission_date'  => 'required|date',
            'notes'           => 'nullable|string',
        ]);

        Patient::create([
            'user_id'         => Auth::id(),
            'patient_name'    => $request->patient_name,
            'age'             => $request->age,
            'gender'          => $request->gender,
            'diagnosis'       => $request->diagnosis,
            'doctor_assigned' => $request->doctor_assigned,
            'status'          => $request->status,
            'admission_date'  => $request->admission_date,
            'notes'           => $request->notes,
        ]);

        return redirect()->route('patients.index')
            ->with('success', 'Patient record added successfully!');
    }

    // Update Patient
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'patient_name'    => 'required|string|max:255',
            'age'             => 'required|integer|min:0|max:150',
            'gender'          => 'required|in:Male,Female',
            'diagnosis'       => 'required|string',
            'doctor_assigned' => 'required|string',
            'status'          => 'required|in:Active,Discharged,Critical',
            'admission_date'  => 'required|date',
            'notes'           => 'nullable|string',
        ]);

        $patient->update([
            'patient_name'    => $request->patient_name,
            'age'             => $request->age,
            'gender'          => $request->gender,
            'diagnosis'       => $request->diagnosis,
            'doctor_assigned' => $request->doctor_assigned,
            'status'          => $request->status,
            'admission_date'  => $request->admission_date,
            'notes'           => $request->notes,
        ]);

        return redirect()->route('patients.index')
            ->with('success', 'Patient record updated successfully!');
    }

    // Delete Patient
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')
            ->with('success', 'Patient record deleted successfully!');
    }
}