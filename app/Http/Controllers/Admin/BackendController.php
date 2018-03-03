<?php
/**
 * Created by PhpStorm.
 * User: korisnik
 * Date: 03-Feb-18
 * Time: 23:37
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class BackendController extends Controller
{
    protected $data;
    protected $model;
    private $view;

    public function construct($view, $title, $subtitle, $createRoute, $indexRoute) {
        $this->data['title'] = $title;
        $this->data['subtitle'] = $subtitle;
        $this->data['createRoute'] = $createRoute;
        $this->data['indexRoute'] = $indexRoute;
        $this->view = $view;
    }

    protected function getView()
    {
        return $this->view;
    }
}