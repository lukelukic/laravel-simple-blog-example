<?php
/**
 * Created by PhpStorm.
 * User: korisnik
 * Date: 04-Feb-18
 * Time: 21:47
 */

namespace App\Models;

class UserModel
{
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $username;
    public $role_id;
    private $table = 'users';

    public function insert()
    {
        return \DB::table($this->table)
            ->insertGetId([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'password' => md5($this->password),
                'email' => $this->email,
                'username' => $this->username,
                'role_id' => $this->role_id,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ]);
    }

    public function selectAll()
    {
        return \DB::table($this->table)
            ->join("roles", "role_id", "=", "roles.id")
            ->select("users.*", "roles.name")
            ->get();
    }

    public function selectOne($id)
    {
        return \DB::table($this->table)
            ->where("id", $id)->first();
    }

    public function delete($id)
    {
        return \DB::table($this->table)
            ->delete($id);
    }

    public function update($id)
    {
        return \DB::table($this->table)
            ->where("id", $id)
            ->update([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'password' => md5($this->password),
                'email' => $this->email,
                'username' => $this->username,
                'role_id' => $this->role_id
            ]);
    }

    public function login()
    {
        return \DB::table($this->table)
            ->join("roles", "users.role_id", "=", "roles.id")
            ->where([
                ['username', '=', $this->username],
                ['password', '=',md5($this->password)]
            ])->select("users.*", "roles.name as role")
            ->get()->first();
    }
}