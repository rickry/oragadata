<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\sendRegisterToken;
use App\Providers\RouteServiceProvider;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function apiRegister(Request $request)
    {
        $rules = [
            'name' => 'unique:users|required',
            'email' => 'unique:users|required|email',
            'password' => 'required',
        ];

        $input = $request->only('name', 'email', 'password');
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'error' => $validator->messages()]);
        }
        $token = sha1(uniqid());

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        $tokenUrl = URL::temporarySignedRoute(
            'verify.email', now()->addMinutes(60), ['register_token' => $token]
        );

        $user = User::create(['name' => $name, 'email' => $email, 'password' => Hash::make($password), "register_token" => $token]);

        Mail::to($user->email)->send(new sendRegisterToken($user, $tokenUrl));

        return response()->json(["success"=> true]);
    }
}
