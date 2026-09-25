# Personal Task Manager

Name: Eunice Jana Pailangco
Section:BSIT SEC10 2nd Year

A simple Laravel-based Personal Task Manager that allows users to create, view, update, and delete tasks.

## Project Description

The Personal Task Manager is a mini CRUD web application developed using Laravel.

The system allows users to manage personal tasks and track their progress through different task statuses.

## Features

* Add a new task
* View all tasks
* Edit an existing task
* Delete a task
* Update task status
* Set a due date
* Validate required task information

## Task Information

Each task contains the following information:

* **Task Name** - Name of the task
* **Description** - Details about the task
* **Status** - Pending or Completed
* **Due Date** - Target date for completing the task

## Technologies Used

* Laravel
* PHP
* SQLite
* Blade Templates
* HTML
* CSS
* Git
* GitHub
* GitHub Codespaces

## Laravel Structure

The project follows the basic Laravel flow:

```text
User
  ↓
Route
  ↓
Controller
  ↓
Model
  ↓
Database
  ↓
Blade View
  ↓
Web Page
```

### Main Project Files

```text
app/
├── Http/
│   └── Controllers/
│       └── TaskController.php
│
└── Models/
    └── Task.php

database/
└── migrations/
    └── create_tasks_table.php

resources/
└── views/
    └── tasks/
        ├── index.blade.php
        ├── create.blade.php
        └── edit.blade.php

routes/
└── web.php
```

## Database

The application uses a `tasks` table with the following fields:

| Field       | Description                        |
| ----------- | ---------------------------------- |
| id          | Unique task ID                     |
| task_name   | Name of the task                   |
| description | Task description                   |
| status      | Pending or Completed               |
| due_date    | Task due date                      |
| created_at  | Date and time the task was created |
| updated_at  | Date and time the task was updated |

## CRUD Operations

The application implements the four basic CRUD operations:

* **Create** - Add a new task
* **Read** - Display existing tasks
* **Update** - Edit task information and status
* **Delete** - Remove a task

## Validation

The application validates task information before saving.

The Task Name is required, while the description and due date are optional.

The status must be either:

* Pending
* Completed

## Running the Project

Install the project dependencies:

```bash
composer install
```

Run the database migrations:

```bash
php artisan migrate
```

Start the Laravel development server:

```bash
php artisan serve
```

Then open the application in a browser.

## Project Testing

The following features were tested:

* Add Task
* View Tasks
* Edit Task
* Update Task
* Update Status
* Delete Task
* Required-field validation
* Due Date
* Pending and Completed status

## Project Status

The Personal Task Manager CRUD functionality has been implemented and tested.

