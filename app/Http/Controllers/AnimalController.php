<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function show()
    {
        $animals = Animal::query()
            ->get();


        return view('animals', [
            'animals' => $animals,
        ]);
    }

    public function search(Request $request)
    {

        $animal_names = $request->input('search');

        $animal_names = Animal::query()
            ->where('name', 'LIKE', "%{$animal_names}%")
            ->get();


        return view('animal_names', compact('animal_names'));
    }
}
