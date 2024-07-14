<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Customer;
// use Doctrine\DBAL\Schema\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
 
    public function store (LoginRequest $request): RedirectResponse

    {
        $request->authenticate();

        $request->session()->regenerate();

        $authUserRole= Auth::user()->user_type;

        if($authUserRole== 0)

        return redirect()->intended(route('index5', absolute: false));
    }

    public function create(): View
    {
        return view('auth.login');
    }


}
