# Test Project for AnnonLab

This project is a test implementation of Laravel 11 with Docker and REST API. It includes APIs for managing users, organizations, and contracts.

## API Endpoints

### Users API
- **Index**: `GET http://localhost:8000/api/users`
  - Retrieve a list of all users.
- **Store**: `POST http://localhost:8000/api/users`
  - Create a new user.
- **Show**: `GET http://localhost:8000/api/users/{id}`
  - Retrieve a specific user by ID.
- **Update**: `PUT/PATCH http://localhost:8000/api/users/{id}`
  - Update a specific user by ID.
- **Destroy**: `DELETE http://localhost:8000/api/users/{id}`
  - Delete a specific user by ID.

### Organizations API
- **Index**: `GET http://localhost:8000/api/organizations`
  - Retrieve a list of all organizations.
- **Store**: `POST http://localhost:8000/api/organizations`
  - Create a new organization.
- **Show**: `GET http://localhost:8000/api/organizations/{id}`
  - Retrieve a specific organization by ID.
- **Update**: `PUT/PATCH http://localhost:8000/api/organizations/{id}`
  - Update a specific organization by ID.
- **Destroy**: `DELETE http://localhost:8000/api/organizations/{id}`
  - Delete a specific organization by ID.

### Contracts API
- **Index**: `GET http://localhost:8000/api/contracts`
  - Retrieve a list of all contracts.
- **Store**: `POST http://localhost:8000/api/contracts`
  - Create a new contract.
- **Show**: `GET http://localhost:8000/api/contracts/{id}`
  - Retrieve a specific contract by ID.
- **Update**: `PUT/PATCH http://localhost:8000/api/contracts/{id}`
  - Update a specific contract by ID.
- **Destroy**: `DELETE http://localhost:8000/api/contracts/{id}`
  - Delete a specific contract by ID.
