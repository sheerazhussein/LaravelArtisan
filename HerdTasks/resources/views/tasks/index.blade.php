<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>My Tasks</h1>
<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    <input type="text" name="title" placeholder="New Task">
    <button type="submit">Add</button>
</form>

<ul>
    @foreach($tasks as $task)
        <li>
            {{ $task->title }}
            <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit">X</button>
            </form>
        </li>
    @endforeach
</ul>
</body>
</html>