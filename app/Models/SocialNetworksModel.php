<?php
/**
 * Created by PhpStorm.
 * User: korisnik
 * Date: 11-Feb-18
 * Time: 20:54
 */

namespace App\Models;


class SocialNetworksModel
{
    public $url;
    public $icon;
    public $name;
    private $table = 'social_networks';

    public function save()
    {
        return \DB::table($this->table)
            ->insertGetId([
                'url' => $this->url,
                'icon' => $this->icon,
                'name' => $this->name
            ]);
    }

    public function update($id)
    {
        return \DB::table($this->table)
            ->where('id', $id)
            ->update([
                'url' => $this->url,
                'icon' => $this->icon,
                'name' => $this->name
            ]);
    }

    public function all()
    {
        return \DB::table($this->table)->get();
    }

    public function delete($id)
    {
        return \DB::table($this->table)
            ->delete($id);
    }

    public function find($id)
    {
        return \DB::table($this->table)
            ->where('id', $id)
            ->get()
            ->first();
    }
}