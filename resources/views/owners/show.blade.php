<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>List of all owners</h1>

  <form action="{{route("owners.search")}}" method="get">
    <a href="{{url("/owners")}}"><button>BACK</button></a>
    Enter owner's surname: <input type="text" name="surname"><br><br>
    <button>SEARCH AN OWNER</button>
  </form><br><br>



  <a href="{{route("owners.create")}}"><button>CREATE A NEW OWNER</button></a>
  {{-- <ul>
    @foreach ($owners as $owner)
    <a href="{{route("owners.detail", $owner->id)}}"><li>{{$owner->first_name}} {{$owner->surname}}</li></a>
    @endforeach

  </ul> --}}

  <table>
    <tr>
      <th>Full Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Address</th>
    </tr>
@foreach($owners as $owner)
<tr>
  <td> <a href="{{route("owners.detail", $owner->id)}}">{{$owner->first_name}} {{$owner->surname}}</a></td>
  <td>{{$owner->email}}</td>
  <td>{{$owner->phone}}</td>
  <td>{{$owner->address}}</td>
</tr>
@endforeach
  </table>
  
</body>
</html>