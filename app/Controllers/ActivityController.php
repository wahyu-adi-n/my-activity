<?php

namespace App\Controllers;

use App\Models\ActivityModel;
use App\Controllers\BaseController;

class ActivityController extends BaseController
{
    public function listOfActivity()
    {
        if ((session()->get('level') == 'staf') || (session()->get('level') == 'koordinator')) {
            return view('activity/pengajuan', [
                'pengajuan_title' => 'Daftar Pengajuan Aktivitas',
                'add_title' => 'Pengajuan Aktivitas',
                'activity' => model('ActivityModel')->getAllDataActivities(),
            ]);
        } else {
            session()->setFlashdata('fail', 'Anda Belum Login!');
            return redirect()->redirect('/login');
        }
    }

    public function pengajuan()
    {
        if ((session()->get('level') == 'staf') || (session()->get('level') == 'koordinator')) {
            return view('activity/pengajuan', [
                'pengajuan_title' => 'Daftar Pengajuan Aktivitas',
                'add_title' => 'Pengajuan Aktivitas',
                'activity' => model('ActivityModel')->getAllDataActivities(),
            ]);
        } else {
            session()->setFlashdata('fail', 'Anda Belum Login!');
            return redirect()->redirect('/login');
        }
    }
    
    public function aktivitas()
    {
        if ((session()->get('level') == 'staf') || (session()->get('level') == 'koordinator')) {
            return view('activity/aktivitas', [
                'aktivitas_title' => 'Daftar Aktivitas',
                'activity' => model('ActivityModel')->getAllDataActiveActivities(),
            ]);
        } else {
            session()->setFlashdata('fail', 'Anda Belum Login!');
            return redirect()->redirect('/login');
        }
    }
    
    public function addActivityProcess()
    {
        $activity = new ActivityModel();
        $activity->save([
            'kode_aktivitas' => "aktivitas-".md5(random_int(1,10)),
            'nama' => $this->request->getVar('nama'),
            'deskripsi' => $this->request->getVar('deskripsi'),
        ]);
        session()->setFlashdata('success', 'Aktivitas Berhasil Diajukan!');
        return redirect()->redirect("/staf/pengajuan");
    }
    
    public function editActivity()
    {
        return view('activity/staf/edit_activity');
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
