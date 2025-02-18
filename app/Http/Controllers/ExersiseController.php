<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exersise;

class ExersiseController extends Controller
{
    public function index(Request $request)
    {
        $exerciseSearch = $request->input('name'); 
        $exercises = Exersise::when($exerciseSearch , function ($query, $exerciseSearch ) {
            return $query->where('name', 'like', "%{$exerciseSearch}%");
        })->get();

        return view('exercise.index', compact('exercises','exerciseSearch'));
    }

    public function show ($id)
    {
        $exercise = Exersise::findOrFail($id);

        return view('exercise.show',['exercise'=>$exercise]);
    }
    public function create ()
    {
        $exercise = new Exersise();
        return view('exercise.create', compact('exercise'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'counts'=>'required'
        ]);
        $exercise = new Exersise();
        $exercise->fill($data);
        $exercise->save();
        return redirect()->route('exercises.index');
    }
    public function edit($id)
    {
        $exercise = Exersise::findOrFail($id);
        return view('exercise.edit',['exercise'=>$exercise]);
    }
    public function update(Request $request,$id){
        
    }
}
