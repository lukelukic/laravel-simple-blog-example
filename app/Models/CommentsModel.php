<?php
/**
 * Created by PhpStorm.
 * User: korisnik
 * Date: 15-Feb-18
 * Time: 22:54
 */

namespace App\Models;


class CommentsModel
{
    public $content;
    public $post_id;
    private $table = 'comments';

    public function save()
    {
        return \DB::table($this->table)
            ->insert([
               'user_id' => session()->get('user')->id,
               'post_id' => $this->post_id,
                'content' => $this->content,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
    }

    public function update($id)
    {
        return \DB::table($this->table)
            ->where('id', $id)
            ->update([
               'content' => $this->content,
               'updated_at' => date("Y-m-d H:i:s")
            ]);
    }

    public function getPostComments($postId)
    {
        return \DB::table($this->table)
            ->join("users", "comments.user_id", "=", "users.id")
            ->where('post_id', $postId)
            ->select('comments.*', 'users.first_name', 'users.last_name')
            ->get();
    }

    public function delete($id)
    {
        if($this->canUserDeleteComment($id)) {
            return \DB::table($this->table)->delete($id);
        }
        return 0;
    }

    public function getUserComments($userId)
    {
        return \DB::table($this->table)->where('user_id', $userId)->get();
    }

    public function find($id)
    {
        return \DB::table($this->table)
            ->where('id', $id)->get()->first();
    }
    private function canUserDeleteComment($commentId)
    {
        $comment = $this->find($commentId);
        //Samo ukoliko je korisnik admin ili komentar odgovara tekucem ulogovanom korisniku, dozvoljeno je brisanje komentara
        return $comment ? (session()->get('user')->role == 'admin') || ($comment->user_id == session()->get('user')->id) : false;
    }
}