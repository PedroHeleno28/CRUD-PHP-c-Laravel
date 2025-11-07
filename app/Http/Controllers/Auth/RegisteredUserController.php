<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        return view('login.cadastrar');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ],
        [
            'name.required' => "O campo Nome é obrigatório",
            'email.email' => "O email informado não é um email válido",
            'email.required' => "O campo email é obrigatório",
            'email.lowecase' => "O email dever conter apenas letras minúsculas",
            'email.unique' => "O email informado já existe na nossa base de dados",
            'password.required' => "O campo senha é obrigatório",            
        ]
    
    );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        //Auth::login($user);

        return redirect()->route('login')
               ->with('sucess','Cliente incluído com sucesso');        
        //return redirect(RouteServiceProvider::HOME);
    }
}
