<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Task</title>
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

   
        form {
            max-width: 800px;
            margin:0 auto;
            margin-top: 90px;
            padding: 30px;
            background-image: linear-gradient(to left top, #ebfdf9, #e6fcf7, #e1fbf5, #dbf9f2, #d6f8f0);            border-radius: 20px; /* Adjusted border-radius to 20px */
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            box-sizing: border-box; 
        }
        label {
            display: block;
            margin-bottom: 30px;
            font-size: 24px; 
            font-weight:bold;    
        }
        input[type="text"],
        input[type="submit"] {
            width: calc(100% - 24px);
            height:70px;
            padding: 12px;
            margin-bottom: 10px;
            border-radius: 10px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 24px; 
        }
        input[type="submit"] {
            background-color: #ff1493;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color:  #ff69b4;
        }
        ul {
            list-style-type: none;
            padding: 0;
            margin-top: 10px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            padding: 10px;
        }
        ul li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
<div class="navbar">Edit</div>
    <!--display validation errors-->
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <!--edit task form-->
    <form method="post" action="{{route('tasks.update', ['task' => $task])}}">
        @csrf 
        @method('put')
        <div>
            <label>Title</label>
            <input type="text" name="title" placeholder="Title" value="{{$task->title}}" />
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="description" placeholder="Description" value="{{$task->description}}" />
        </div>
        <div>
            <input type="submit" value="Update" />
        </div>
    </form>
</body>
</html>