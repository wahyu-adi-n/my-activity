<?php

namespace App\Models;

use CodeIgniter\Model;

class ActivityModel extends Model
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
    public function getAllDataActiveActivities() 
    {   
        return $this->db->query("SELECT * FROM $this->table 
        WHERE status=2 OR status=3 ORDER BY id ASC")->getResultArray();  
    }
}
