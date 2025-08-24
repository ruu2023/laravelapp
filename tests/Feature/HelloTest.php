<?php

use App\Models\User;

function createPerson()
{
    $ob = new App\Models\User;
    $ob->name = 'alice';
    $ob->email = 'alice@wonderland';
    $ob->password = 'wonderland';
    $ob->save();
    return $ob;
}
test('check database Person find', function() {
    $ob = createPerson();
    $res = App\Models\User::where('name', 'alice')->first();
    expect($res)->not->toBeNull();
});
test('check database User create', function() {
    // ユーザーを作成
    $user = App\Models\User::factory()->create();
    expect($user)->not->toBeNull();
});
test('check database Person create' ,function() {
    $p = App\Models\Person::factory()->create();
    expect($p)->not->toBeNull();
});

test('check database Person create and find' , function() {
    $p = App\Models\Person::factory()->create();
    $res = App\Models\Person::where('name', $p->name)->first();
    expect($res)->not()->toBeNull();
});
test('check database Person find all', function() {
    $arr = [
        App\Models\Person::factory()->create(),
        App\Models\Person::factory()->create(),
        App\Models\Person::factory()->create(),
    ];
    $res = App\Models\Person::all();
    expect($res->count())->toEqual(count($arr));
});
test('access to "hello"', function () {
    $response = $this->get('/hello');

    $response->assertStatus(200);
});
test('access to "person"', function () {
    $response = $this->get('/person');

    $response->assertStatus(200);
});
test('access to "board"', function () {
    $response = $this->get('/board');

    $response->assertStatus(200);
});
test('access to "login"', function () {
    $response = $this->get('/hello/login');

    $response->assertStatus(200);
});
// ------------------------------------------------
// シナリオ1: ログイン成功のテスト
// ------------------------------------------------
test('登録済みのユーザーが正しい認証情報でログインできる', function () {
    // ① Arrange (準備): テスト用のユーザーをDBに作成する
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => bcrypt('password123'), // パスワードはハッシュ化して保存
    ]);

    // ② Act (実行): 作成したユーザーの情報でログインを試みる
    $response = $this->post('/hello/loginPost', [
        'email' => 'test@example.com',
        'password' => 'password123', // ログイン試行時は平文のパスワードを渡す
    ]);

    // ③ Assert (検証):
    // ログインが成功し、'/hello'にリダイレクトされることを確認(302も確認)
    $response->assertRedirect('/hello');
    // 指定したユーザーとして認証されていることを確認
    $this->assertAuthenticatedAs($user);
});
