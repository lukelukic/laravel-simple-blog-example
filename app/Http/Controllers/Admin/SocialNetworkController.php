<?php

namespace App\Http\Controllers\Admin;

use App\Models\SocialNetworksModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialNetworkController extends BackendController
{
    public function __construct()
    {
        parent::construct('admin.pages.social',"Social networks management", "Manage your webiste's social network connections", "social.create", "social.index");
        $this->model = new SocialNetworksModel();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['social_networks'] = $this->model->all();
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
        $rules = [
            'url' => 'required|url|unique:social_networks',
            'name' => 'required|alpha_num',
            'icon' => 'required|alpha'
        ];
        $validator = \Validator::make($request->all(), $rules);
        $validator->validate();

        try {
            $this->model->icon = $request->get('icon');
            $this->model->name = $request->get('name');
            $this->model->url = $request->get('url');
            $this->model->save();
            return redirect(route('social.index'))->with("success", "Social network successfully added!");
        } catch (QueryException $e) {
            \Log::error("Greska pri upisu posta u bazu: " . $e->getMessage());
        }

        return redirect()->back()->with("error", "An error occured, please try again later");
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['form'] = 'edit';
        $this->data['social'] = $this->model->find($id);
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
        $rules = [
            'url' => 'required|url',
            'name' => 'required|alpha_num',
            'icon' => 'required|alpha'
        ];
        $validator = \Validator::make($request->all(), $rules);
        $validator->validate();

        try {
            $this->model->icon = $request->get('icon');
            $this->model->name = $request->get('name');
            $this->model->url = $request->get('url');
            $this->model->update($id);
            return redirect(route('social.index'))->with("success", "Social network successfully updated!");
        } catch (QueryException $e) {
            \Log::error("Greska pri upisu drustvene mreze u bazu: " . $e->getMessage());
        }

        return redirect()->back()->with("error", "An error occured, please try again later");
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
            return redirect(route('social.index'))->with("success", "Social network successfully deleted!");
        } catch (QueryException $e) {
            \Log::error("Greska pri brisanju drustvene mreze: " . $e->getMessage());
            return redirect()->back()->with("error", "An error occured, please try again later");
        }
    }
}
