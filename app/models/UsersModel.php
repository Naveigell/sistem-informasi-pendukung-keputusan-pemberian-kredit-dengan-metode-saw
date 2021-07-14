<?php
namespace App\Models;

class UsersModel extends Model {
    protected $table = 'user';
    protected $primaryKey = 'id_user';

    public function getUser($username)
    {
        return $this->query("SELECT * FROM $this->table WHERE username = ?", [$username]);
    }
}