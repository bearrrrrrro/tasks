<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasks</title>
</head>
<style>
    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
</style>
<body>
    <h1>Task List</h1>
    <div class="top-right links">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
    
            <ul class="dropdown-menu">
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>
    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
    </div>
    <table style='width:50%'>
        <tr>
            <th>title</th>
            <th>description</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($tasks as $task)
            <tr>
                @if ($task->is_completed)
                <td><del>{{ $task->title }}</del></td>
                <td><del>{{ $task->description }}</del></td>
                @else
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                @endif
                <td><a href="{{ url('tasks/delete/'.$task->id) }}">delete</a></td>
                <td><a href="{{ url('tasks/check/'.$task->id) }}">check</a></td>
            </tr>
        @endforeach

    </table>
    Add task
    <form action="/tasks/submit" method="POST">
        {{ csrf_field() }}
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                Please fix the following errors
            </div>
        @endif
        <div>
            <label for="title"></label>
            <input type="text" id="title" name="title" placeholder="task title here">
        </div>
        <div>
            <label for="description"></label>
            <input type="text" id="description" name="description" placeholder="task description here">
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</body>
</html>