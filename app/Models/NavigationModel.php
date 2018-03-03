<?php
/**
 * Created by PhpStorm.
 * User: korisnik
 * Date: 11-Feb-18
 * Time: 19:59
 */

namespace App\Models;


class NavigationModel
{
    public $position;
    public $route;
    public $name;
    private $table = 'navigation';

    public function save()
    {
        return \DB::table($this->table)
                ->insertGetId([
                    'route' => $this->route,
                    'position' => $this->position,
                    'name' => $this->name
                ]);
    }

    public function update($id)
    {
        return \DB::table($this->table)
            ->where('id', $id)
            ->update([
                'route' => $this->route,
                'position' => $this->position,
                'name' => $this->name
            ]);
    }

    public function delete($id)
    {
        return \DB::table($this->table)
            ->delete($id);
    }

    public function all()
    {
        return \DB::table($this->table)
            ->orderBy("position", "asc")
            ->get();
    }

    public function find($id)
    {
        return \DB::table($this->table)->where('id', $id)->get()->first();
    }

}