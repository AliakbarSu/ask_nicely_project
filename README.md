# AskNicely

This web application is built using PHP and Vue.js. With this system, users can upload a CSV file containing employee information, view the list of employees, and see the average salary for companies.

## Getting Started

Before running the application, make sure you have the following prerequisites installed on your system:

1. Node.js - [Node.js Installation Guide](https://nodejs.org/en/download/)
2. Docker - [Docker Installation Guide](https://docs.docker.com/engine/install/)

## Installation

1. Clone the repository from GitHub:

   ```bash
   git clone git@github.com:AliakbarSu/ask_nicely_project.git
   cd ask_nicely_project
   ```

## Development

1. Navigate to the `src/frontend` directory:

   ```bash
   cd src/frontend
   ```

2. Run the following command to install the dependencies:

   ```bash
        npm install
   ```

3. Run the following command inside the project root directory to start the backend server:

   ```bash
        docker compose up
   ```

4. Follow the migration steps bellow.

5. Run the following command to start the frontend application and navigate to `http://localhost:5173/` to view the application in development.

   ```bash
        npm run dev
   ```

## Migration

run the following command inside the project root directory:

```bash
    docker compose exec php php ./Migrations/migrate.php
```

OR

```bash
    make migrate
```

## Testing

To run the tests, run the following command inside the `src/frontend` directory:

```bash
    npm run test:unit
```

## Build

To build the application, run the following command inside the `src/frontend` directory:

```bash
    npm run build
```

Open your browser and navigate to `http://127.0.0.1/` to view the built application.
