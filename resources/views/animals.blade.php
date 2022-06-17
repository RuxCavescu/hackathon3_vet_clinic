<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Vet Clinic Search form</h1>

    <ul>
            @foreach($animals as $animal)
      <li><a href="/animals/detail">{{$animal->name}}</a></li>
      @endforeach;

    </ul>

</body>
</html>

