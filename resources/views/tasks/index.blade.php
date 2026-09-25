<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Personal Task Manager</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            margin: 0;
            padding: 40px 20px;
            color: #222;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        h1 {
            margin: 0;
            font-size: 30px;
        }

        .subtitle {
            margin-top: 8px;
            color: #666;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
            color: white;
        }

        .btn-add {
            background: #222;
        }

        .btn-edit {
            background: #555;
        }

        .btn-delete {
            background: #b00020;
        }

        .btn:hover {
            opacity: 0.85;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 12px 15px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 14px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f1f3f5;
            font-size: 14px;
        }

        td {
            font-size: 14px;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-completed {
            background: #d4edda;
            color: #155724;
        }

        .actions {
            display: flex;
            gap: 6px;
        }

        .actions form {
            display: inline;
        }

        .empty {
            text-align: center;
            padding: 40px 20px;
            color: #666;
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .card {
                overflow-x: auto;
            }

            table {
                min-width: 800px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <div>
            <h1>Personal Task Manager</h1>
            <div class="subtitle">
                Manage your tasks and track their progress.
            </div>
        </div>

        <a href="/tasks/create" class="btn btn-add">
            + Add Task
        </a>
    </div>

    @if (isset($success))
        <div class="success">
            {{ $success }}
        </div>
    @endif

    <div class="card">

        @if ($tasks->count())

            <table>
                <thead>
                    <tr>
                        <th>Task Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($tasks as $task)

                        <tr>

                            <td>
                                <strong>{{ $task->task_name }}</strong>
                            </td>

                            <td>
                                {{ $task->description ?? 'No description' }}
                            </td>

                            <td>

                                @if ($task->status === 'Completed')

                                    <span class="status status-completed">
                                        Completed
                                    </span>

                                @else

                                    <span class="status status-pending">
                                        Pending
                                    </span>

                                @endif

                            </td>

                            <td>
                                {{ $task->due_date?->format('Y-m-d') ?? 'No due date' }}
                            </td>

                            <td>

                                <div class="actions">

                                    <a
                                        href="/tasks/{{ $task->id }}/edit"
                                        class="btn btn-edit"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="/tasks/{{ $task->id }}"
                                        method="POST"
                                    >
                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-delete"
                                            onclick="return confirm('Are you sure you want to delete this task?')"
                                        >
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>
            </table>

        @else

            <div class="empty">

                <h3>No tasks found</h3>

                <p>
                    Click <strong>+ Add Task</strong> to create your first task.
                </p>

            </div>

        @endif

    </div>

</div>

</body>
</html>