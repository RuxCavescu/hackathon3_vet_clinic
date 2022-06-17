<?php

namespace App\Http\Controllers;
use App\Models\Animal;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $animal = new Animal;
      return view("animals/create", compact("animal"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        "name" => "required",
        "species" => "required",
        "age" => "required|numeric",
        "weight" => "required|numeric",
        "owner_id" => "required",
      ]);

      $animal = new Animal;
      $animal->name = $request->input("name");
      $animal->species = $request->input("species");
      $animal->breed = $request->input("breed");
      $animal->age = $request->input("age");
      $animal->weight = $request->input("weight");
      $animal->owner_id = $request->input("owner_id");

      $animal->save();

      session()->flash("success_message", "Pet was successfully created!");

      return redirect(route("animals.edit", $animal->id));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal = Animal::findOrFail($id);
        return view("animals/create", compact("animal"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        "name" => "required",
        "species" => "required",
        "age" => "required|numeric",
        "weight" => "required|numeric",
        "owner_id" => "required",
      ]);
      
      
      $animal = Animal::findOrFail($id);

      $animal->name = $request->input("name");
      $animal->species = $request->input("species");
      $animal->breed = $request->input("breed");
      $animal->age = $request->input("age");
      $animal->weight = $request->input("weight");
      $animal->owner_id = $request->input("owner_id");

      $animal->save();

      session()->flash("success_message", "Pet was successfully edited!");

      return redirect(route("animals.edit", $animal->id));

      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $animal = Animal::findOrFail($id);

      $animal->delete();

      session()->flash("success_message", "Pet was successfully deleted!");

      return redirect(route("animals.show"));
    }
}
