<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = "/admin/login";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:reader')->except('logout');
    }

    public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {
//        $this->validate($request, [
//            'email'   => 'required|email',
//            'password' => 'required|min:6'
//        ]);


        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->route("admin.dashboard.index");
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function showBloggerLoginForm()
    {
        return view('auth.login', ['url' => 'reader']);
    }

    public function bloggerLogin(Request $request)
    {
//        $this->validate($request, [
//            'email'   => 'required|email',
//            'password' => 'required|min:6'
//        ]);

        if (Auth::guard('reader')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->route("admin.dashboard.index");
        }
        return back()->withInput($request->only('email', 'remember'));
    }


    public function redirectAfterLogout($guard){
        $route = "";
        switch ($guard){
            case "reader":
                $route .=  "/user/login";
                break;
            case "admin":
                $route .=  "/admin/login";
                break;
        }
        return $route;
    }

    public function getCurrentGuard(){
        switch (true){
            case Auth::guard("reader")->check():
                return "reader";
                break;
            case Auth::guard("admin")->check():
                return "admin";
                break;
        }
        return '';
    }

    public function logout(Request $request)
    {
        $guard = $this->getCurrentGuard();

        $this->guard($guard)->logout();


        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new \Illuminate\Http\JsonResponse([], 204)
            : redirect($this->redirectAfterLogout($guard));
    }
}
