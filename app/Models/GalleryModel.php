<?php
/**
 * Created by PhpStorm.
 * User: korisnik
 * Date: 11-Feb-18
 * Time: 20:29
 */

namespace App\Models;


class GalleryModel
{
    public $title;
    public $description;
    public $picture_id;
    private $table = 'gallery';
    public function save()
    {
        return \DB::table($this->table)
            ->insertGetId([
               'title' => $this->title,
               'description' => $this->description,
               'picture_id' => $this->picture_id
            ]);
    }

    public function delete($id)
    {
        return \DB::table($this->table)
            ->delete($id);
    }

    public function find($id)
    {
        return \DB::table($this->table)
            ->join('pictures', 'gallery.picture_id', '=', 'pictures.id')
            ->where('gallery.id', $id)
            ->select("gallery.*", "pictures.file", "pictures.alt")
            ->get()->first();
    }

    public function all()
    {
        return \DB::table($this->table)
            ->join('pictures', 'gallery.picture_id', '=', 'pictures.id')
            ->select("gallery.*", "pictures.file", "pictures.alt")
            ->get();
    }


    public function update($id)
    {
        if($this->picture_id) {
            $updateData = [
                'title' => $this->title,
                'description' => $this->description,
                'picture_id' => $this->picture_id
            ];
        } else {
            $updateData = [
                'title' => $this->title,
                'description' => $this->description
            ];
        }
        return \DB::table($this->table)
            ->where('id', $id)
            ->update($updateData);
    }




}