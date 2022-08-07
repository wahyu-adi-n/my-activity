<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ActivityController extends BaseController
{
    public function dashboard()
    {
        if ((session()->get('level') == 'staf') || (session()->get('level') == 'koordinator')) {
            return view('activity/dashboard', [
                'list_title' => 'Daftar Aktivitas',
                'add_title' => 'Tambah Aktivitas',
                'activity' => model('ActivityModel')->getAllDataActivities(),
            ]);
        } else {
            session()->setFlashdata('fail', 'Anda Belum Login!');
            return redirect()->redirect('/login');
        }
    }
    
    // public function addActivityProcess($kode)
    // {
    //     return;
    // }
    
    public function editActivity()
    {
        return view('activity/edit_activity');
    }
    
    // public function editActivityProcess($kode)
    // {
    //     return;
    // }
    
    // public function deleteActivity($kode)
    // {
    //     return view('activity/delete_activity');
    // }
    
    // public function showActivity($kode)
    // {
    //     return view('activity/show_activity');
    // }
}
