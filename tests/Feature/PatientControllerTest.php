<?php 

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PatientControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test for Valid Request
     */
    public function testStoreValidRequest()
    {
        $data = [
            [
                'patientNationality' => 'SG',
                'patientNric' => 'S0000000A',
                'patientName' => 'Tan Chen Chen',
                'patientGender' => 'Female',
                'patientBirthDate' => '1990-01-15',
                'patientEmail' => 'tanchenchen@gmail.com',
                'sampleUniqueId' => 'Sample001',
                'sampleResults' => 'Negative',
                'collectedDateTime' => '2021-02-01T12:00:00Z',
                'effectiveDateTime' => '2021-02-01T12:00:00Z',
            ],
        ];

        $response = $this->postJson('/patients', ['patients' => $data]);

        $response->assertStatus(201);
        $response->assertJson(['message' => 'Patient record(s) created successfully']);
    }

    /**
     * Test for Invalid Request
     * i.e. Invalid Dates, Nationality Code, Email, DateTimes
     *
     * @return void
     */
    public function testStoreInvalidRequest()
    {
        $data = [
            [
                'patientNationality' => 'ZZ', // Invalid nationality code
                'patientNric' => 'S0000000A',
                'patientName' => 'Tan Chen Chen',
                'patientGender' => 'Other', // Invalid gender
                'patientBirthDate' => '1990/01/15', // Invalid date format
                'patientEmail' => 'tanchenchen.gmail.com', // Invalid email format
                'sampleUniqueId' => 'Sample001',
                'sampleResults' => 'Negative',
                'collectedDateTime' => '2021/02/01T12:00:00Z', // Invalid datetime format
                'effectiveDateTime' => '2021/02/01T12:00:00Z', // Invalid datetime format
            ],
            [
                // Missing required attributes
            ],
        ];

        $response = $this->postJson('/patients', ['patients' => $data]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors([
            '0.patientNationality', 
            '0.patientGender',
            '0.patientBirthDate',
            '0.patientEmail',
            '0.collectedDateTime',
            '0.effectiveDateTime',
            '1.patientNationality', 
            '1.patientNric', 
            '1.patientName', 
            '1.patientGender',
            '1.patientBirthDate',
            '1.patientEmail',
            '1.sampleUniqueId',
            '1.sampleResults',
            '1.collectedDateTime',
            '1.effectiveDateTime',
        ]);
    }
}
