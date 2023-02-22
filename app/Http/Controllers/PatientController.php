<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Store a new patient record.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request input
        $patientsData = $request -> input('patients');
        $patients = [];
        foreach ($patientsData as $patientData) {
            $patientData['collectedDateTime'] = str_replace(['T','Z'], " ",$patientData['collectedDateTime']);
            $patientData['effectiveDateTime'] = str_replace(['T','Z'], " ",$patientData['effectiveDateTime']);
            $patient = new Patient($patientData);
            if (!$patient -> isValid()) {
                return response(['error' => 'Invalid patient record'], 422);
            } 
            $patients[] = Patient::create($patientData);
        }

        // Save the patient records to the database

        return response(['message' => 'Patient record(s) created successfully'], 201);
    }
}
