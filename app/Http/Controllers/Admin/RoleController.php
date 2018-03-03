<?php

namespace App\Http\Controllers\Admin;

use App\Models\RoleModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends BackendController
{
    private $roleModel;
    public function __construct()
    {
        parent::construct("admin.pages.roles", "Roles management", "Manage your user's roles", "roles.create", "roles.index");
        $this->roleModel = new RoleModel();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['roles'] = $this->roleModel->selectAll();
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
        $request->validate([
            'name' => 'required|alpha|min:2|max:20'
        ], $request->all());

        $this->roleModel->name = $request->get('name');
        try {
            $this->roleModel->insert();
            return redirect()->back()->with("success", "Role successfully added!");
        } catch(QueryException $e) {
            \Log::error("Greška pri dodavanju uloge: " . $e->getMessage());
            return redirect()->back()->with("error", "An error has occurred! Please check the log file.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
