<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        //return redirect()->route('welcome');
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        $validator = Validator::make($request->all(), User::$rules);
      //  dd($validator->fails());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cpf'=> $request->cpf,
            'cnpj'=> $request->cnpj,
            'tituloeleitor'=> $request->tituloeleitor,
            'telefone'=> $request->telefone,
            'cep'=> $request->cep,
            'logradouro'=> $request->logradouro,
            'complemento'=> $request->complemento,
            'bairro'=> $request->bairro,
            'localidade'=> $request->localidade,
            'uf'=> $request->uf,
            'tipo'=> $request->tipo,
            'regiao'=> $request->regiao,
            'cnes'=> $request->cnes,
            'registrocc'=>$request->registrocc,
            'modalidade'=> $request->modalidade,
        ])->givePermissionTo('user');

        event(new Registered($user));
         
        Auth::login($user);
        $data  = $user;
        \Mail::to($data->email)->send(new \App\Mail\ComprovanteEmail($data));
        return redirect(RouteServiceProvider::HOME);
    }
}
