<?php

namespace App\Http\Controllers\Auth;

use ErrorException;
use App\Models\User;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

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
        $this->middleware('guest')->except('logout');
    }
    
    protected function guard()
    {
        return Auth::guard('api');
    }

    public function token()
    {
        $user = request()->user();

        if (!$user) {
            throw new UnauthorizedHttpException('', 'User is not logged in!');
        }

        $token = $this->getToken($user);

        return response()->json(['token' => $token]);
    }
    
    private function getToken(User $user): string
    {
        return $this->guard()->fromUser($user);
    }

    protected function sendLoginResponse(\Illuminate\Http\Request $request)
    {
        $user = $this->guard()->getLastAttempted();
    
        $token = $this->getToken($user);
    
        return response()->json(['token' => $token]);
    }
    
    protected function sendFailedLoginResponse(\Illuminate\Http\Request $request)
    {
        throw ErrorException::withCode('auth.invalidCredentials', 422, 'auth.failed');
    }
    
    protected function sendLockoutResponse(\Illuminate\Http\Request $request)
    {
        $seconds = $this->limiter()->availableIn(
            $this->throttleKey($request)
        );
    
        throw ErrorException::withCode('auth.tooManyLoginAttempts', 429, 'auth.throttle', ['seconds' => $seconds]);
    }
}
