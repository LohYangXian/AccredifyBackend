*Patient Management API*

A RESTful API for managing patient data.

Installation
Clone this repository
Run composer install to install dependencies
Run cp .env.example .env to create a .env file
Configure your database connection in .env
Run php artisan migrate to run database migrations
Run php artisan serve to start the local development server


Usage

Endpoints

POST /api/patients
Create a new patient given a JSON input of patients.


Request body:

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

Responses
Responses are in JSON format.

Authentication
This API does not require authentication.


Test Coverage
The Patients API is thoroughly tested using PHPUnit, Laravel's built-in testing framework. The tests cover various use cases, including valid and invalid inputs, authentication, and error handling.

To run the tests, navigate to the project root directory and run the following command:

php artisan test
This will run all of the test cases in the tests/Feature directory and output the results to the console. The output will indicate which tests passed, which tests failed, and any error messages or stack traces.

Additionally, test coverage reports can be generated using PHPUnit's built-in coverage tools. To generate a coverage report, run the following command:

php artisan test --coverage-html=coverage-report

This will run the tests and generate an HTML coverage report in the coverage-report directory. The coverage report will show which lines of code were executed by the tests and which lines were not. This can be useful for identifying areas of the code that are not adequately covered by the test suite.

Technical Documentation
Architecture Overview
The Patients API is a RESTful web service built using the Laravel framework, with a MySQL database backend. The API is designed to allow CRUD (Create, Read, Update, Delete) operations on patient records, as well as the ability to search for patients by various criteria.

The following diagram shows the high-level architecture of the application:

Architecture Diagram

Requests to the API are routed through the routes/api.php file, which maps HTTP verbs and URL patterns to specific controller methods. The controller methods are responsible for processing the request, retrieving or updating data from the database as necessary, and returning a response to the client.

The database schema consists of a single table, patients, which stores patient records. The fields in the table correspond to the various attributes of a patient (e.g. patientNationality, patientNric, etc.). The id field is an auto-incrementing primary key that uniquely identifies each record.

Design Considerations
The Patients API is designed to be simple and easy to use, with a focus on the core functionality of managing patient records. Some design considerations include:

Validation: Input data is validated to ensure that it meets certain criteria (e.g. patientNationality is a valid ISO-3166 Alpha 2 code, patientEmail is a valid email address, etc.).
Error Handling: The API returns meaningful error messages in the event that an error occurs (e.g. validation errors, database errors, etc.).
Data Consistency: The database is designed to ensure data consistency, with various constraints and indices in place to prevent duplicate records or inconsistent data.
Security: The API uses Laravel's built-in CSRF protection to prevent cross-site request forgery attacks, and also includes validation of user input to prevent SQL injection attacks.
