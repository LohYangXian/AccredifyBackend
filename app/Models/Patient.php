<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'patientNationality',
        'patientNric',
        'patientName',
        'patientGender',
        'patientBirthDate',
        'patientEmail',
        'sampleUniqueId',
        'sampleResults',
        'collectedDateTime',
        'effectiveDateTime',
    ];

    /**
     * Check if this patient is a valid patient.
     *
     * @return bool
     */
    public function isValid()
    {
        $validator = Validator::make($this->toArray(), [
            'patientNationality' => 'required|size:2|regex:/^[A-Z]{2}$/',
            'patientNric' => 'required|string',
            'patientName' => 'required|string',
            'patientGender' => 'required|string|in:Female,Male',
            'patientBirthDate' => 'required|date_format:Y-m-d',
            'patientEmail' => 'required|email',
            'sampleUniqueId' => 'required|string',
            'sampleResults' => 'required|string',
            'collectedDateTime' => 'required|date_format:Y-m-d H:i:s ',
            'effectiveDateTime' => 'required|date_format:Y-m-d H:i:s ',
        ]);
        return !$validator->fails();
    }
}


    // public static function validateNRIC($icNumber) {
    //     $IC_LENGTH = 9;

    //     if (strlen($icNumber) != $IC_LENGTH) {
    //         return false;
    //     }

    //     $icNumber = strtoupper($icNumber);

    //     $ic_Sum = 0;
    //     //Add 4 to alpha if first alphabet is T or G
    //     if ($icNumber[0] == "T" || $icNumber[0] == "G") {
    //         $ic_Sum += 4;
    //     } 
    //     //Add First Integer of IC Number multiplied by 2 to Alpha
    //     $ic_Sum += (intval($icNumber[1], 10) * 2);
    //     //Continue computing value of Alpha with IC checksum logic
    //     for ($i = 2; $i < $IC_LENGTH - 1; $i++) {
    //         $ic_Sum += (intval($icNumber[$i], 10) * ($IC_LENGTH - $i));
    //     }

    //     $ic_Remainder = $ic_Sum % 11;
        

    // }

