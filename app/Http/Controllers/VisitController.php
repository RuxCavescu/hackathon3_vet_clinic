<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Visit;
use App\Models\Animal;

class VisitController extends Controller
{
    public function show(Request $request)
    {

        $animals = Animal::query()
            ->get();

            // dd($animals);
        $pet = Animal::query()
            ->where('id', $request->id)
            ->first();

        $visits = Visit::query()
            ->where('animal_id', 'like', $request->id)
            ->get();

        return view('view-visits', compact('visits', 'pet'));
    }

    public function create(Request $request)
    {
        $this->validateVisit($request);

        $pet = Animal::query()
            ->where('id', $request->id)
            ->first();

        $visit = new Visit;

        $visit->animal_id = $request->id;
        $visit->date = $request->date;
        $visit->visit_detail = $request->visit_detail;

        $visit->save();

        $visits = Visit::query()
            ->where('animal_id', 'like', $request->id)
            ->get();

        return view('view-visits', compact('visit', 'pet', 'visits'));
    }

    public function edit(Request $request, $pet_id, $visit_id)
    {
        $this->validateVisit($request);

        $visit = Visit::query()
            ->where('id', $visit_id)
            ->first();

            // dd($visit);

        $pet = Animal::query()
            ->where('id', $pet_id)
            ->first();

            // dd($pet);
        
        return view('edit-visit', compact('visit', 'pet'));
    }

    public function update(Request $request, $pet_id, $visit_id)
    {
        $visit = Visit::query()
            ->where('id', $visit_id)
            ->first();

            // dd($visit);

        $pet = Animal::query()
            ->where('id', $pet_id)
            ->first();

        $visit->date = $request->date;
        $visit->visit_detail = $request->visit_detail;
        $visit->save();

        session()->flash('success_message', 'The visit was updated!');

        return redirect( url('/animals/'.$pet_id.'/detail/view-visits') );
    }

    public function destroy(Request $request, $pet_id, $visit_id)
    {

        $visit = Visit::findOrFail($visit_id);

        $visit->delete();

        session()->flash('success_message', 'Visit was succesfully deleted.');

        return redirect( url('/animals/'.$pet_id.'/detail/view-visits') );
    }

    private function validateVisit(Request $request)
        {
            $this->validate($request, [
                'date' => 'required|regex:/^\d{1,2}[.]\d{1,2}[.]\d{4}$/i',
                'visit_detail' => 'required',
            ], [
                'date.required' => 'The date is required!',
                'visit_detail.required' => 'Please fill in some details about the visit.',
                'date.regex' => 'Please fill in the data in the format DD.MM.YYYY',
            ]);
        }
}
