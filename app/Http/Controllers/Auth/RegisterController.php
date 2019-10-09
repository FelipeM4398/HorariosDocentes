<?php

namespace App\Http\Controllers\Auth;

use App\Facultad;
use App\Http\Controllers\Controller;
use App\Programa;
use App\TipoContrato;
use App\Usuario;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\TipoUsuario;
use SebastianBergmann\Environment\Console;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    function index()
    {
        $roles = TipoUsuario::where('id', '>', 1)->get();
        $contratos = TipoContrato::all();
        $facultades = Facultad::all();
        $programas = Programa::all();
        return view('auth/register', compact('roles'), compact('contratos', 'facultades', 'programas'));
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'identificacion' => ['required', 'numeric', 'max:9999999999'],
            'nombres' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'numeric', 'max:9999999999'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Usuario
     */
    protected function create(array $data)
    {
        echo json_encode($data);
        if ($data['docente']) {
            return Usuario::create([
                'identificacion' => $data['identificacion'],
                'nombres' => $data['nombres'],
                'apellidos' => $data['apellidos'],
                'telefono' => $data['telefono'],
                'email' => $data['email'],
                'verificado' => false,
                'id_tipo_usuario' => 4,
                'id_tipo_contrato' => $data['contrato'],
                'password' => Hash::make($data['password']),
            ]);
        } else {
            return Usuario::create([
                'identificacion' => $data['identificacion'],
                'nombres' => $data['nombres'],
                'apellidos' => $data['apellidos'],
                'telefono' => $data['telefono'],
                'email' => $data['email'],
                'verificado' => false,
                'password' => Hash::make($data['password']),
            ]);
        }
    }
}
