<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
</head>
<body>
    <h1>Task Manager</h1>
    <form action="/tasks" method="post">
        @csrf
        <input type="text" name="title" placeholder="Task title">
        <button type="submit">Add Task</button>
    </form>
    <ul>
        @foreach($tasks as $task)
            <li>
                {{ $task->title }} 
                @if(!$task->is_done)
                    <form action="/tasks/{{ $task->id }}/is_done" method="POST" style="display: inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit">Mark as completed</button>
                    </form>
                @endif
                <form action="/tasks/{{ $task->id }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>