<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelloRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
class HelloController extends Controller
{
    public function index(Request $request ) {

        // if(isset($request->id)) {
        //     $param = ['id' => $request->id];
        //     $items = DB::select('select * from people where id = :id', $param);
        // } else {
        //     $items = DB::select('select * from people');
        // }
        $items = DB::table('people')
            ->orderBy('age', 'asc')
            ->get();
        return view('hello.index', ['items' => $items]);
    }

    public function post(HelloRequest $request)
    {
        $items = DB::select('select * from people');
        return view( 'hello.index', ['items' => $items]);
    }

    public function add(Request $request)
    {
        return view('hello.add');
    }

    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age,
        ];

        // DB::insert('insert into people (name, email, age) values (:name, :email, :age)', $param);
        DB::table('people')->insert($param);
        return redirect('/hello');
    }

    public function edit(Request $request)
    {
        // $param = ['id' => $request->id];
        // $item = DB::select('select * from people where id = :id', $param);
        $item = DB::table('people')
            ->where('id', $request->id)
            ->first();
        return view('hello.edit', ['form'=> $item]);
    }

    public function update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'age' => $request->age
        ];
        // DB::update('update people set name = :name, email = :email, age = :age where id = :id', $param);
        DB::table('people')
            ->where('id', $request->id)
            ->update($param);
        return redirect('/hello');
    }
    public function del(Request $request)
    {
        // $param = ['id' => $request->id];
        // $item = DB::select('select * from people where id = :id', $param);
        $item = DB::table('people')
            ->where('id', $request->id)
            ->first();
        return view('hello.del' , ['form' => $item]);
    }

    public function remove(Request $request)
    {
        // $param = ['id' => $request->id];
        // DB::delete('delete from people where id = :id' , $param);
        DB::table('people')
            ->where('id', $request->id)
            ->delete();
        return redirect('/hello');
    }

    public function show(Request $request)
    {
        // $name = $request->name;
        // $items = DB::table('people')
        //     ->where('name','like', '%' . $name . '%')
        //     ->orWhere('email', 'like', '%' . $name . '%')->get();

        // $min = $request->min;
        // $max = $request->max;
        // $items = DB::table('people')
        //     ->whereRaw('age >= ? and age <= ?' , [$min, $max])->get();
        $page = $request->page;

        $items = DB::table('people')
            ->offset($page * 3)
            ->limit(5)
            ->get();
        return view('hello.show', ['items' => $items]);
    }
}
