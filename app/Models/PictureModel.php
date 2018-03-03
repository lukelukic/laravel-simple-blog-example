<?php
/**
 * Created by PhpStorm.
 * User: korisnik
 * Date: 11-Feb-18
 * Time: 19:42
 */

namespace App\Models;


class PictureModel
{
    public $file;
    public $alt;
    private $table = "pictures";

    public function save()
    {
        return \DB::table($this->table)
            ->insertGetId([
                'file' => $this->file,
                'alt' => $this->alt,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
    }

    public function find($id)
    {
        return \DB::table($this->table)
            ->where('id', $id)
            ->get()
            ->first();
    }

    public function delete($id)
    {
        return \DB::table($this->table)
            ->delete($id);
    }

}