<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

  <a href="{{route("owners.show")}}"><button>GET BACK TO OWNER'S LIST</button></a>
  @include ("common/messages")

  @if ($owner->id)
  <h1>Edit an owner {{$owner->first_name}} {{$owner->surname}}</h1>
  <form action="{{route("owners.update", $owner->id)}}" method="POST">
    @method("PATCH")
  @else
  <h1>Create a new owner</h1>
  <form action="{{route("owners.store")}}" method="POST">
  @endif

    @csrf
    Enter owners's name: <input type="text" name="first_name" value={{old("first_name", $owner->first_name)}}><br><br>
    Enter owners's surname: <input type="text" name="surname" value={{old("surname", $owner->surname)}}><br><br>
    Enter owners's email: <input type="text" name="email" value={{old("email", $owner->email)}}><br><br>
    Enter owners's phone: <input type="number" name="phone" value={{old("phone", $owner->phone)}}><br><br>
    Enter owners's address: <input type="number" name="address" value={{old("address", $owner->address)}}><br><br>

    @if ($owner->id)
    <button type="submit">EDIT AN OWNER</button>
    @else
        <button type="submit">CREATE AN OWNER</button>
    @endif

  </form>
  
</body>
</html>