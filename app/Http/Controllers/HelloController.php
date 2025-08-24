<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelloRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Person;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HelloController extends Controller
{
    public function register()
    {
        return view('hello.register');
    }

    /**
     * ユーザー登録処理
     */
    public function registerPost(Request $request)
    {
        // ① バリデーション (入力値のチェック)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', // emailはユニーク(一意)であること
            'password' => 'required|string|min:8|confirmed', // 8文字以上、確認用入力と一致すること
        ]);

        // ② ユーザーを作成
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // パスワードは必ずハッシュ化する
        ]);

        // ③ 登録後に自動でログインさせる
        Auth::login($user);

        // ④ 登録完了後にリダイレクト
        return redirect('/hello'); // 例えばメインページにリダイレクト
    }
    public function login() {
        return view('hello.login');
    }
    public function logout() {
        Auth::logout();
        return redirect('/hello');
    }
    public function loginPost(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email'=>$email, 'password'=>$password], false))
        {
            return redirect('/hello');
        }
        return redirect('/hello/login');
    }
    public function index(Request $request ) {
        $sort = $request->sort;
        $items = Person::orderBy($sort, 'asc')->paginate(5);
        $params = ['items' => $items, 'sort' => $sort];
        return view('hello.index', $params);
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

    public function ses_get(Request $request)
    {
        $sesdata = $request->session()->get('msg');
        return view('hello.session', ['session_data' => $sesdata]);
    }

    public function ses_put(Request $request)
    {
        $msg = $request->input;
        $request->session()->put('msg', $msg);
        return redirect('hello/session');
    }
}
