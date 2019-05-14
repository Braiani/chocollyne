<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Requests\FinishCheckout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:cliente');
    }

    public function index()
    {
        $user = Auth::user();

        return view('perfil.index', compact('user'));
    }

    public function update(FinishCheckout $request, Cliente $cliente)
    {
        $request->merge(['receber_news' => $request->has('news')]);

        !$request->has('news') ?: $request->offsetUnset('news');
        $request->password != null ? $request->merge(['password' => Hash::make($request->password)]) : $request->offsetUnset('password');

        $cliente->update($request->all());

        toastr('Informações salvas com sucesso!', 'success');
        return redirect()->route('admin.home');
    }
}
