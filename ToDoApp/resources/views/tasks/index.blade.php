<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasks</title>
    <style>
        .strikethrough {
            text-decoration: line-through;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
          var checkboxes = document.querySelectorAll('#strikethroughCheckbox');

          checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function(event) {
              var row = event.target.closest('tr');
              var titleCell = row.querySelector('td.title');
              var descriptionCell = row.querySelector('td.description');

              if (event.target.checked) {
                titleCell.classList.add('strikethrough');
                descriptionCell.classList.add('strikethrough');
                } else {
                titleCell.classList.remove('strikethrough');
                descriptionCell.classList.remove('strikethrough'); 
                }
            });
          });
        });
    </script>
</head>
<body>
    <h1>Tasks</h1>
    <div>
        @if(session()->has('success'))
            <div>
                {{session('success')}}
            </div>
        @endif
    </div>
    <div>
        <div>
            <a href="{{route('tasks.create')}}">Create a Task</a>
        </div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Completed</th>
                <th>Title</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @if(!empty($tasks))
                @foreach($tasks as $task)
                    <tr>
                        <td>{{$task->id}}</td>
                        <td>
                            <input type="checkbox" id="strikethroughCheckbox">
                        </td>
                        <td class="title">{{$task->title}}</td>
                        <td class="description">{{$task->description}}</td>
                        <td>
                            <a href="{{route('tasks.edit', ['task' => $task])}}">Edit</a>
                        </td>
                        <td>
                            <form method="post" action="{{route('tasks.destroy', ['task' => $task])}}">
                                @csrf 
                                @method('delete')
                                <input type="submit" value="Delete" />
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
</body>
</html>