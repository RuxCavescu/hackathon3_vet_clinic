<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class DetailController extends Controller
{
    public function detail($id)
    {

        $animal = Animal::findOrFail($id);

        return view('detail', [
            'animal' => $animal
        ]);
    }
}
