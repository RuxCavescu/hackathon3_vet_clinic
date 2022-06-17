<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
            <ul>
            @foreach($animal_names as $animal_name)
      <li style="list-style-type: none;"><a style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color:brown; font-size: 24px " href="/animals/{{$animal_name->id}}/detail">{{$animal_name->name}}</a></li>
      @endforeach;

    </ul>
</body>
</html>