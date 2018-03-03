<?php

namespace App\Http\Controllers\Admin;

use App\Models\RoleModel;
use App\Models\UserModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends BackendController
{
    public function __construct()
    {
        parent::construct('admin.pages.users',"Users management", "Manage your webiste's users", "users.create", "users.index");
        $this->model = new UserModel();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['users'] = $this->model->selectAll();
        return view($this->getView(), $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['form'] = 'insert';
        $roleModel = new RoleModel();
        $this->data['roles'] = $roleModel->selectAll();
        return view($this->getView(), $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Definisanje pravila za validaciju
        $rules = [
            'first_name' => 'required|alpha|min:2|max:20',
            'last_name' => 'required|alpha|min:2|max:20',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'min:6',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/'
            ],
            'role_id' => 'required'
        ];

        //Kastomizacija poruka
        $messages = [
            "password.regex" => 'Password must contain one uppercase letter and one number.',
            'role_id.required' => 'User role must be selected.'
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
        $userModel->role_id = $request->get("role_id");

        try {
            $userModel->insert();
            return redirect(route("users.index"))->with("success", "User successfully added!");
        } catch(\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "An server error has occurred, please try again later.");
        }
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['user'] = $this->model->selectOne($id);
        $this->data['form'] = 'edit';

        $roleModel = new RoleModel();
        $this->data['roles'] = $roleModel->selectAll();
        return view($this->getView(), $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Definisanje pravila za validaciju
        $rules = [
            'first_name' => 'required|alpha|min:2|max:20',
            'last_name' => 'required|alpha|min:2|max:20',
            'email' => 'required|email',
            'password' => [
                'required',
                'min:6',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/'
            ],
            'role_id' => 'required'
        ];

        //Kastomizacija poruka
        $messages = [
            "password.regex" => 'Password must contain one uppercase letter and one number.',
            'role_id.required' => 'User role must be selected.'
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
        $userModel->role_id = $request->get("role_id");

        try {
            $userModel->update($id);
            return redirect(route("users.index"))->with("success", "User successfully added!");
        } catch(\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "An server error has occurred, please try again later.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->model->delete($id);
            return redirect(route("users.index"))->with("success", "User successfully deleted!");
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return redirect(route("users.index"))->with("success", "An error has occurred, please check log file.");
        }
    }
}
