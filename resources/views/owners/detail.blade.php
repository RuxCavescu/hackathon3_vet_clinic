<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Details</title>
</head>
<body>
  <h1>Details of {{$owner->first_name}}{{$owner->surname}}</h1>
  <a href="{{route(
    "owners.edit", $owner->id)}}"><button>EDIT THIS OWNER</button></a>
  <p>Name : {{$owner->first_name}}</p>
  <p>Surname : {{$owner->surname}}</p>
  <p>Email : {{$owner->email}}</p>
  <p>Phone : {{$owner->phone}}</p>
  <p>Address : {{$owner->address}}</p>
  {{-- <p>Pets : {{$owner->animals()->pluck("name")->join(", ")}}</p> --}}

  {{-- {{ dump($owner) }};
  {{ dump($owner->animals) }}; --}}

  <p>Pets:</p>

    <ul>
      @foreach ($owner->animals as $animal)
          <li style="display: flex; flex-direction: row; align-items: center;"> 
            <p>* {{ $animal->name }}</p> 
            <a href="{{ "animals/".$animal->id }}" style="padding-left:50px;">See Details ></a>
          </li>
      @endforeach
    </ul>
    
    
    

  
  </table>
  
</body>
</html>