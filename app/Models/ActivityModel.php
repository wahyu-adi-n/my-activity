<?php

namespace App\Models;

use CodeIgniter\Model;

class ActivityModel extends Model
{
    protected $table = 'activity';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'kode_aktivitas', 'nama', 'kode_user',
        'deskripsi', 'status'
    ];
    
    public function getAllDataActivities($kode = false)
    {
        
        if ($kode) {
            return $this->db->query("SELECT * FROM $this->table WHERE kode_user='$kode' ORDER BY id ASC ")->getResultArray(); 
        }
        return $this->db->query("SELECT * FROM $this->table ORDER BY id ASC ")->getResultArray();    
    }
    
    public function getAllDataActiveActivities() 
    {   
        return $this->db->query("SELECT * FROM $this->table 
        WHERE status=2 OR status=3 ORDER BY id ASC")->getResultArray();  
    }    
}
