# Project Roadmap

This is the project roadmap, which outlines the future features and refactoring planned for the project.

## Future Features

- Add `Update`, `Read` and `Delete` operations
- Implement patient search functionality to search by patient name, NRIC or sample unique ID
- Include validation rules for NRIC (there is already an existing checksum algorithm online)
- Add pagination to patient list endpoint
- Implement API rate limiting to prevent abuse

## Refactoring

- Move validation rules to a separate Request class
- Improve validation rules (e.g. Add HashMap of Country Codes to refer to for Nationality instead of writing generic rules)
- Implement unit and integration tests for all API endpoints
- Consider using a NoSQL database like MongoDB for storing test results data if performance becomes an issue

