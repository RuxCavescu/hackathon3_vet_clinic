<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  @include ("common/messages")

  @if ($animal->id)
  <h1>Edit an animal {{$animal->name}}</h1>
  <form action="{{route("animals.update", $animal->id)}}" method="POST">
    @method("PATCH")
  @else
  <h1>Create a new animal</h1>
  <form action="{{route("animals.store")}}" method="POST">
  @endif

    @csrf
    Enter pet's name: <input type="text" name="name" value={{old("name", $animal->name)}}><br><br>
    Enter pet's species: <input type="text" name="species" value={{old("species", $animal->species)}}><br><br>
    Enter pet's breed: <input type="text" name="breed" value={{old("breed", $animal->breed)}}><br><br>
    Enter pet's age: <input type="number" name="age" value={{old("age", $animal->age)}}><br><br>
    Enter pet's weight: <input type="number" name="weight" value={{old("weight", $animal->weight)}}><br><br>
    Enter pet's owner id: <input type="number" name="owner_id" value={{old("owner_id", $animal->owner_id)}}><br><br>

    @if ($animal->id)
    <button type="submit">EDIT AN ANIMAL</button>
    @else
        <button type="submit">CREATE ANIMAL</button>
    @endif

  </form>
  
</body>
</html>