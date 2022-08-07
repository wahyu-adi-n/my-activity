<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'activity';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'kode_aktivitas', 'nama',
        'deskripsi', 'status'
    ];
    
    public function getAllDataActivities()
    {
        return $this->db->query("SELECT * FROM $this->table ORDER BY id ASC ")->getResultArray();    
    }
}
