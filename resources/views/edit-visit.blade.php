<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Visit</title>
</head>
<body>
    <h1>Add a new visit for {{ $pet['name'] }}. Please fill in the details of the visit:</h1>

    <form action=" {{ action(['App\Http\Controllers\VisitController', 'update'], [$pet->id, $visit->id]) }}" style="display: flex; flex-direction: column; width: 50%;" method="post">
        @csrf
        @method('put')
        <input type="text" name="date" value="{{ old('date', $visit->date) }}">
        <textarea name="visit_detail" id="" cols="30" rows="10">{{ old('visit_detail', $visit->visit_detail) }}</textarea>

        <button>Save visit {{ $pet['name'] }}</button>
    </form>


</body>
</html>