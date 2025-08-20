<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index(Request $request)
    {
        // $items = Person::all();
        // return view('person.index' , ['items' => $items]);
        $hasItems = Person::has('boards')->get();
        $noItems = Person::doesntHave('boards')->get();
        $param = [
            'hasItems' => $hasItems,
            'noItems' => $noItems,
        ];
        return view('person.index', $param);
    }

    public function find(Request $request)
    {
        return view('person.find', ['input' => '']);
    }

    public function search(Request $request)
    {
        // $item = Person::where('name', $request->input)->first();
        // $item = Person::nameEqual($request->input)->first();
        $min = $request->input * 1;
        $max = $min + 10;
        $item = Person::ageGreaterThan($min)
            ->ageLessThan($max)
            ->first();
        $param = ['input' => $request->input, 'item' => $item];
        return view('person.find', $param);
    }

    public function add(Request $request)
    {
        return view('person.add');
    }

    public function create(Request $request)
    {
        $request->validate(Person::$rules);
        $person = new Person;
        $form = $request->all();
        unset($form['__token']);
        $person->fill($form)->save();
        return redirect('/person');
    }

    public function edit(Request $request)
    {
        $person = Person::find($request->id);
        return view('person.edit' , ['form'=>$person]);
    }

    public function update(Request $request)
    {
        $request->validate(Person::$rules);
        $person = Person::find($request->id);
        $form = $request->all();
        unset($form['__token']);
        $person->fill($form)->save();
        return redirect('/person');
    }

    public function del(Request $request)
    {
        $person = Person::find($request->id);
        return view('person.del', ['form' => $person]);
    }

    public function remove(Request $request)
    {
        Person::find($request->id)->delete();
        return redirect('/person');
    }
}
