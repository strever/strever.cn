<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * 定义登陆用户名字段
     *
     * @return string
     */
    public function username()
    {
        return 'name';
    }

    /**
     * 登陆完成后的跳转地址
     *
     * @return string
     */
    protected function redirectTo()
    {
        $referrer = Request::server('HTTP_REFERER');
        return filter_var($referrer, FILTER_VALIDATE_URL) !== false ? $referrer : route('article.create');
    }


}
