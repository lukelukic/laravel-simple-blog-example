<?php
/**
 * Created by PhpStorm.
 * User: korisnik
 * Date: 11-Feb-18
 * Time: 19:22
 */

namespace App\Models;


class PostModel
{
    public $title;
    public $content;
    public $picture_id;
    public $user_id;
    public $description;
    private $table = 'posts';

    public function save()
    {
        return \DB::table($this->table)
            ->insertGetId([
               'title' => $this->title,
               'content' => $this->content,
               'user_id' => $this->user_id,
               'picture_id' => $this->picture_id,
               'description' => $this->description
            ]);
    }

    public function update($id)
    {
        $updateData = [
            'title' => $this->title,
            'content' => $this->content,
            'description' => $this->description,
            'updated_at' => date("Y-m-d H:i:s")
        ];
        if ($this->picture_id != null) {
          $updateData['picture_id'] = $this->picture_id;
        }
        return \DB::table($this->table)
            ->where('id', $id)
            ->update($updateData);
    }

    public function delete($id)
    {
        return \DB::table($this->table)
            ->delete($id);
    }

    public function find($id)
    {
        return \DB::table($this->table)
            ->join('pictures', 'posts.picture_id', '=', 'pictures.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('posts.id', $id)
            ->select('posts.*', 'pictures.file', 'pictures.alt', 'users.first_name', 'users.last_name', \DB::raw("(SELECT count(id) FROM visits WHERE post_id = $id) as visits"))
            ->get()->first();
    }

    public function latest()
    {
        return \DB::table($this->table)
            ->join('pictures', 'posts.picture_id', '=', 'pictures.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'pictures.file', 'pictures.alt', 'users.first_name', 'users.last_name')
            ->orderBy("created_at", "desc")
            ->get()->take(3);
    }

    public function last()
    {
        return \DB::table($this->table)
            ->join('pictures', 'posts.picture_id', '=', 'pictures.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'pictures.file', 'pictures.alt', 'users.first_name', 'users.last_name', \DB::raw("(SELECT count(*) FROM comments WHERE post_id = posts.id) as comments"))
            ->orderBy("created_at", "desc")
            ->get()->first();
    }

    public function all()
    {
        return \DB::table($this->table)
            ->join('pictures', 'posts.picture_id', '=', 'pictures.id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'pictures.file', 'pictures.alt', 'users.first_name', 'users.last_name')
            ->get();
    }

    public function getPictureId($postId)
    {
        return \DB::table($this->table)
            ->where('id', $postId)
            ->select("posts.picture_id as id")
            ->get()->first()->id;
    }

    public function addVisit($id, $ip)
    {
        return \DB::table("visits")
            ->insert([
                'ip' => $ip,
                'post_id' => $id
            ]);
    }

}