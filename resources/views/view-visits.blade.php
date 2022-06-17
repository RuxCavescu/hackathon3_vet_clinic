<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visits List</title>
</head>
<body>
    <h1>Here are a list of previous visits for {{ $pet['name'] }}:</h1>
    <h3>Total visits to date: {{ count($visits) }} visits.</h3>

    @if ($visits)
        <ul>
            @foreach ($visits as $visit)
                <div style="display: flex; flex-direction: row; justify-content: space-between;">

                    <div>
                        <li>- on {{ $visit['date'] }}</li>
                        <p>{{ $visit['visit_detail'] }}</p>
                    </div>

                <div style="display: flex; flex-direction: column;">
                    
                    <a href='/animals/{{ $pet->id }}/detail/edit-visit/{{$visit->id}}' style="padding-right: 300px;"><button>Edit</button></a>

                    <form action=" {{ action(['App\Http\Controllers\VisitController', 'destroy'], [$pet->id, $visit->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button>Delete</button>
                    </form>

                </div>
    
                </div>
            @endforeach
        </ul>
        @else <p>{{ $pet['name'] }} didn't have any visits yet.</p>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger" style="background-color: red; color: white;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    @if (Session::has('success_message'))
        <div class="alert alert-success" style="background-color: green; color: white;">
            {{ Session::get('success_message') }}
        </div>
    @endif

    <h3>Add a new visit for {{ $pet['name'] }}. Please fill in the details of the visit:</h3>

    <div class='create__visit'>
        <form action=" {{ action(['App\Http\Controllers\VisitController', 'create'], $pet->id) }}" style="display: flex; flex-direction: column; width: 50%;" method="post">
            @csrf
            <input type="text" name="date">
            <textarea name="visit_detail" id="" cols="30" rows="10"></textarea>
            <button>Add visit for {{ $pet['name'] }}</button>
        </form>
    </div>

    <button>Back to Pet View</button>

    {{-- @include('add-visit') --}}

    {{-- <form action=" {{ action(['App\Http\Controllers\VisitController', 'create'], [$pet->id]) }}" method="get">
        @csrf
        <button>Add visit for {{ $pet['name'] }} </button>
    </form> --}}
</body>
</html>
