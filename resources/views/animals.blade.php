<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: brown"
    >Vet Clinic Search form</h1>
    
    <a href="{{ route('animals.create') }}"><button>Create new animal</button></a>

 <form action="animals/search">
        <div class="container" style="margin-top: 50px;">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">

                    <div class="form-group">
                        <h4>Search your animal!</h4>
                        <input type="text" name="search" id="search" placeholder="Enter name..." class="form-control" onfocus="this.value=''">
                  
                    </div>
                    <div id="search_list"></div>
                </div>
     </form>


            </div>
        </div>





    <ul>
            @foreach($animals as $animal)
      <li style="list-style-type: none;"><a style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color:brown; font-size: 24px " href="/animals/{{$animal->id}}/detail">{{$animal->name}}</a></li>
      @endforeach

    </ul>




</body>
</html>

