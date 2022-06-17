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

    public function search()
    {
        // $id = Animal::query()
        //     - get();
    }
}
