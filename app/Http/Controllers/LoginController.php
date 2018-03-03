<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Dotenv\Exception\ValidationException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $userModel = new UserModel();
        $userModel->username = $request->get("username");
        $userModel->password = $request->get("password");
        $user = $userModel->login();
        if ($user) {
            $request->session()->put('user', $user);
            return $user->role == "admin" ? redirect(route("users.index")) : redirect(route("home"));
        } else {
            return redirect()->back()->with("warning", "Wrong username or password.");
        }
    }

    public function register(Request $request)
    {
        //Definisanje pravila za validaciju
        $rules = [
            'first_name' => 'required|alpha|min:2|max:20',
            'last_name' => 'required|alpha|min:2|max:20',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'confirmed',
                'min:6',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/'
            ]
        ];

        //Kastomizacija poruka
        $messages = [
            "password.regex" => 'Password must contain one uppercase letter and one number.'
        ];

        //Primena validacije, ukoliko je ima grešaka vrši se redirekcija requesta- na prethodnu stranu sa sve greškama
        $validator = \Validator::make($request->all(), $rules, $messages);
        $validator->validate();

        //Ukoliko je validacija uspesna, korisnik se upisuje u bazu

        $userModel = new UserModel();
        $userModel->first_name = $request->get('first_name');
        $userModel->last_name = $request->get("last_name");
        $userModel->email = $request->get('email');
        $userModel->password = $request->get("password");
        $userModel->username = $request->get("username");
        $userModel->role_id = 1;

        try {
            $userModel->insert();
            return redirect()->back()->with("success", "Registration successful, you can login now.");
        } catch(QueryException $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "An server error has occurred, please try again later.");
        }
    }

    public function logout()
    {
        session()->forget('user');
        return redirect(route("loginForm"));
    }
}
