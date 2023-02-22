# Patients API

A RESTful API for managing patient data.

## Installation

1. Clone the repository.
2. Install dependencies with `composer install`.
3. Copy `.env.example` to `.env` and modify the `DB_*` variables to match your environment.
4. Run `php artisan key:generate`.
5. Run `php artisan migrate`.
6. Run `php artisan serve` to start the local development server

## Usage

The following endpoints are available:

### `POST /api/patients`

Creates a new patient with the given data.

Example request body:

```json
{
  "patientNationality": "SG",
  "patientNric": "S0000000A",
  "patientName": "Tan Chen Chen",
  "patientGender": "Female",
  "patientBirthDate": "1990-01-15",
  "patientEmail": "tanchenchen@gmail.com",
  "sampleUniqueId": "Sample001",
  "sampleResults": "Negative",
  "collectedDateTime": "2021-02-01T12:00:00Z",
  "effectiveDateTime": "2021-02-01T12:00:00Z"
}
```

## Responses
Responses are in JSON format.

## Authentication
This API does not require authentication.


# Test Coverage
The Patients API is thoroughly tested using PHPUnit, Laravel's built-in testing framework. The tests cover various use cases, including valid and invalid inputs, authentication, and error handling.

To run the tests, navigate to the project root directory and run the following command:

`php artisan test`
This will run all of the test cases in the tests/Feature directory and output the results to the console. The output will indicate which tests passed, which tests failed, and any error messages or stack traces.

Additionally, test coverage reports can be generated using PHPUnit's built-in coverage tools. To generate a coverage report, run the following command:

`php artisan test --coverage-html=coverage-report`

This will run the tests and generate an HTML coverage report in the coverage-report directory. The coverage report will show which lines of code were executed by the tests and which lines were not. This can be useful for identifying areas of the code that are not adequately covered by the test suite.

## Testing using Postman

### Test for Valid Request

<img width="1004" alt="Screenshot 2023-02-23 at 3 43 30 AM" src="https://user-images.githubusercontent.com/97585353/220741512-a0dd235c-9132-487b-9158-92b63a8af6ac.png">

### Test for InValid Request

1. Invalid patientNationality
<img width="1011" alt="Screenshot 2023-02-23 at 3 58 31 AM" src="https://user-images.githubusercontent.com/97585353/220744984-6fd55ab0-4e96-447f-9b62-41a6ed6b2336.png">

2. Invalid Gender
<img width="1011" alt="Screenshot 2023-02-23 at 3 48 06 AM" src="https://user-images.githubusercontent.com/97585353/220742424-43c1ed6e-bbed-4d77-bceb-7523aefff821.png">

3. Invalid patientBirthDate
<img width="1020" alt="Screenshot 2023-02-23 at 3 48 35 AM" src="https://user-images.githubusercontent.com/97585353/220742505-77f38ef6-6e3f-4641-8068-7ea942eb8d5f.png">

4. Invalid Email
<img width="1027" alt="Screenshot 2023-02-23 at 3 47 04 AM" src="https://user-images.githubusercontent.com/97585353/220742224-05bc8b93-28a8-47a8-b6cd-582da2039d47.png">

5. Invalid effectiveDateTime & collectedDateTime

<img width="1012" alt="Screenshot 2023-02-23 at 3 49 47 AM" src="https://user-images.githubusercontent.com/97585353/220742733-2dbc1c0e-3c47-46c0-a524-e1f7c6a533eb.png">


# Technical Documentation

## Architecture Overview
The Patients API is a RESTful web service built using the Laravel framework, with a MySQL database backend. 

### Architecture Diagram

Requests to the API are routed through the routes/api.php file, which maps HTTP verbs and URL patterns to specific controller methods. The controller methods are responsible for processing the request, retrieving or updating data from the database as necessary, and returning a response to the client.

The database schema consists of a single table, patients, which stores patient records. The fields in the table correspond to the various attributes of a patient (e.g. patientNationality, patientNric, etc.). The id field is an auto-incrementing primary key that uniquely identifies each record.

### Design Considerations
The Patients API is designed to be simple and easy to use, with a focus on the core functionality of managing patient records. Some design considerations include:

1. Validation: Input data is validated to ensure that it meets certain criteria (e.g. patientNationality is a valid ISO-3166 Alpha 2 code, patientEmail is a valid email address, etc.).

    a. patientNationality: Validated the length of the string == 2 and if only alphabets are present
    
    b. patientGender:      Validated if the input == `Female` or  `Male`.
    
    c. patientBirthday:    Validated if the format of the date is in `Y-m-d`.
    
    d. patientEmail:       Validated if the format of the email is correct (eg. @gmail.com)
    
    e. patientBirthday:    Validated if the format of the date is in `Y-m-d H:i:s`.
    
    f. patientBirthday:    Validated if the format of the date is in `Y-m-d H:i:s`.
    
2. Error Handling: The API returns meaningful error messages in the event that an error occurs (e.g. validation errors, database errors, etc.).
3. Data Consistency: The database is designed to ensure data consistency, with various constraints and indices in place to prevent duplicate records or inconsistent data.
4. Security: The API uses Laravel's built-in CSRF protection to prevent cross-site request forgery attacks, and also includes validation of user input to prevent SQL injection attacks.
