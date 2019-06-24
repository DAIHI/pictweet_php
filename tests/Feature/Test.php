<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Auth;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function login_view()
    {
        $response = $this->get('login');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function unauthenticated_user_cannot_view_edit()
    {
        $response = $this->get('tweets/1/edit');

        $response->assertRedirect('login');
    }

    /**
     * @test
     */
    public function valid_user_can_login()
    {
        // ダミーのユーザを作成
        $user = factory(User::class)->create([
            'password'  => bcrypt('testtest')
        ]);

        // ログインされていないことを検証
        $this->assertFalse(Auth::check());

        // ログインのリクエストを送りレスポンスを受け取る
        $response = $this->post('login', [
            'email'    => $user->email,
            'password' => 'testtest'
        ]);

        // ログインされていることを検証
        $this->assertTrue(Auth::check());

        // ログイン後にトップページへリダイレクトされることを検証
        $response->assertRedirect('/');
    }
}
