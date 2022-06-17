<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;

class OwnerController extends Controller
{
    public function search(Request $request)
    {
      if ($request->has('surname')) 

      {
        $surname = $request->input("surname");
        $owners = Owner::query()
                      ->where("surname", "like", "%$surname%")
                      ->get();


      } else {
        $surname = "";
        $owners = collect();
      }

      // return redirect(route("owners.show", $owners));
      return view("owners/show", compact("owners"));

      

    }
  
  
  
    public function show()
    {
      $owners = Owner::query()
                      ->get();

      return view("owners/show", compact("owners"));
    }

    public function detail($id)
    {
      $owner = Owner::findOrFail($id);
      return view("owners/detail", compact("owner"));
    }


    public function create()
    {
      $owner = new Owner;
      return view("owners/create", compact("owner"));
    }


    public function store(Request $request)
    {
      $this->validate($request, [
        "first_name" => "required",
        "surname" => "required",
        "email" => "required|email",
        // "phone" => "required|numeric",
        // "address" => "required",
      ]);

      $owner = new owner;
      $owner->first_name = $request->input("first_name");
      $owner->surname = $request->input("surname");
      $owner->email = $request->input("email");
      $owner->phone = $request->input("phone");
      $owner->address = $request->input("address");

      $owner->save();

      session()->flash("success_message", "Owner was successfully created!");

      return redirect(route("owners.edit", $owner->id));
    }


    public function edit($id)
    {
        $owner = owner::findOrFail($id);
        return view("owners/create", compact("owner"));
    }

    public function update(Request $request, $id)
    {
      $this->validate($request, [
        "first_name" => "required",
        "surname" => "required",
        "email" => "required|email",
      ]);
      
      
      $owner = owner::findOrFail($id);

      $owner->first_name = $request->input("first_name");
      $owner->surname = $request->input("surname");
      $owner->email = $request->input("email");
      $owner->phone = $request->input("phone");
      $owner->address = $request->input("address");

      $owner->save();

      session()->flash("success_message", "Owner was successfully edited!");

      return redirect(route("owners.edit", $owner->id));

      
    }
}
