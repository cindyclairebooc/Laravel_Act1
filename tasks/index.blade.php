<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>To-Do List</title>
    <style> 
    body {
        font-family: Arial, sans-serif;
        margin: 0; 
        padding: 0; 
        background-image: linear-gradient(to left bottom, #d9bdc8, #e7abbb, #f399a6, #fc878b, #ff7769, #ff7278, #ff6e88, #ff6c99, #eb89d3, #c6a9f7, #a3c3ff, #98d7ff);    
        background-size: cover;
        background-position: center; 
        min-height: 100vh; 
    }
    .navbar {
        font-weight: bold; 
        font-size:90px;
        text-align:center;
        padding:70px;
        color:white;
        border: 1px solid white;
        
    }
    .container {
        width: 100%; 
        max-width: 1500px; 
        margin: 0 auto; 
        padding: 30px; 
        margin-top:100px;
        box-shadow: 0 80px 900px rgba(0,0,0,0.1);
        margin-bottom: 580px;
        border: 2px white;
        background-image: linear-gradient( #ebfdf9, #e6fcf7, #e1fbf5, #dbf9f2, #d6f8f0); 
    }
    .form {

        max-width: 900px; 
        margin: 20px auto; 
        padding: 25px;
        background-color: #fff;
        border-radius: 20px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        box-sizing: border-box;
    }
    input[type="checkbox"]:checked {
        background-color: green; 
    }
    

    table {
        width: 100%; 
        border-collapse: collapse;
        margin-top: 20px;
        border: 1px solid gray;
        font-size:20px;
        background-color: #dedfe4;
    }
    th, td {
        padding: 15px; 
        border-bottom: 1px solid #ddd;
        background-color: #ffff;
        text-align:center;
    }
    th {
        background-color: #dedfe4;
        padding: 15px;
        text-align: left;
        border: 2px solid gray; 
        text-align:center;
    }
    td.title {
        font-weight: bold;
    }
    .strikethrough {
        text-decoration: line-through; 
    }
    .pink-button {
        background-color: #ff1493;
        color: white;
        padding: 20px 30px; 
        border: white;
        text-decoration: none;
        font-size:20px;
        display: inline-block;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s; 
    }
        .pink-button:hover {
            background-color: #ff69b4; 
        }

        .edit-button {
            background-color: #3498db; 
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .delete-button {
            background-color: #e74c3c; 
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
   
        input[type="checkbox"] {
             display: none;
        }   
        .checkbox {
             position: relative;
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 2px solid green;
            cursor: pointer;
        }
        .checkbox::after {
            content: "\2713"; 
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: transparent; 
        }       
        input[type="checkbox"]:checked + .checkbox::after {
            color: green; 
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
    <div class="navbar">To-Do List</div>
    <div class="container">
        @if(session()->has('success'))
            <div class="success">
                {{session('success')}}
            </div>
        @endif
        <div>
            <button class="pink-button" onclick="location.href='{{route('tasks.create')}}';">Create a Task</button>
        </div>
        <table>
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
    <label>
        <input type="checkbox" name="completed" id="strikethroughCheckbox">
        <span class="checkbox"></span>
    </label>
</td>

                        <td class="title">{{$task->title}}</td>
                        <td class="description">{{$task->description}}</td>
                        <td>
                            <a href="{{route('tasks.edit', ['task' => $task])}}">
                                <button class="edit-button"><i class="fas fa-edit"></i></button>
                            </a>
                        </td>
                        <td>
                            <form method="post" action="{{route('tasks.destroy', ['task' => $task])}}">
                                @csrf 
                                @method('delete')
                                <button type="submit" class="delete-button"><i class="fas fa-trash-alt"></i></button> 
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
</body>
</html>