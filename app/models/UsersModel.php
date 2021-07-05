<?php
namespace App\Models;

class UsersModel extends Model {
    protected $table = 'users';
    protected $primaryKey = 'id_users';

    public function getUsers()
    {
        var_dump($this->all());
    }
}