<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'kode_user', 'nama',
        'email', 'password', 'level',
    ];
    
    public function login($email, $password)
    {
        return $this->db->query("SELECT * FROM $this->table WHERE email ='$email' AND password='$password' ")->getRowArray();
    }

    public function cek($email)
    {
        return $this->db->query("SELECT * FROM $this->table WHERE email ='$email'")->getRowArray();
    }

    public function getAllDataUsers($id = false)
    {
        if ($id === false) {
            return $this->db->query("SELECT * FROM $this->table ORDER BY kode_user ASC ")->getResultArray();
        }
        return $this->db->query("SELECT * FROM $this->table WHERE kode_user = $id")->getRowArray();
    }

    public function deleteUserById($id)
    {
        return $this->db->query("DELETE FROM $this->table WHERE kode_user = '$id'");
    }

    public function getTotalUser()
    {
        return $this->db->query("SELECT * FROM $this->table")->getNumRows();
    }

    public function getUserByEmail($email)
    {
        return $this->db->query("SELECT * FROM $this->table WHERE email = '$email'")->getRowArray();
    }
}
