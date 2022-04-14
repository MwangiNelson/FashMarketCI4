<?php

namespace App\Models;

use CodeIgniter\Model;

class user_model extends Model
{
    // ...
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username','full_name','email','password','role_id'];

    public function display_Users()
    {
        $db = db_connect();

        $status = $db->query("SELECT * FROM users WHERE `role_id`= '1' ");

        return $status->getResultArray();
    }
    public function deleteUser($id)
    {
        $db = db_connect();

        $res = $db->query("DELETE FROM users WHERE `id` = $id");
        return $res;
    }
    public function register($username, $full_name, $email, $password, $role_id)
    {
        $db = db_connect();
        $role = 1;

        $res = $db->query("INSERT INTO users (username,full_name,email,password,role_id)VALUES('$username','$full_name','$email','$password','$role')");

        return $res;
    }
    public function checkuser($email, $password)
    {
        $db = db_connect();

        $res = $db->query("SELECT * FROM users WHERE email='$email' AND password='$password' AND role_id = 1");

        $row = $res->getRowArray();

        return $row;
    }
    public function checkAdmin($email, $password){
        $db = db_connect();

        $res = $db->query("SELECT * FROM users WHERE email='$email' AND password='$password' AND role_id = 2");

        $row = $res->getRowArray();

        return $row;

    }
    public function getAdmin($admin_id){
        $db = db_connect();

        $res = $db->query("SELECT * FROM users WHERE id = $admin_id  AND role_id = 2");

        return $res->getResultArray();

    }

}