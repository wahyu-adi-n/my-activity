<?php

namespace App\Controllers;

use App\Models\ActivityModel;
use App\Models\UserModel;
use App\Controllers\BaseController;

class ActivityController extends BaseController
{
    public function listOfStaff()
    {
        if (session()->get('level') == 'koordinator') {
            return view('/koordinator/daftar_staf', [
                'daftar_staf_title' => 'Daftar Staf',
                'staff' => model('UserModel')->getAllDataStaff(),
            ]);
        } else {
            session()->setFlashdata('fail', 'Anda Belum Login atau Role Tidak Sama!');
            return redirect()->redirect('/login');
        }
    }
    
    public function listOfActivity()
    {
        if (session()->get('level') == 'koordinator'){
            return view('/koordinator/daftar_pengajuan_aktivitas', [
                'daftar_pengajuan_title' => 'Daftar Pengajuan Aktivitas',
                'activity' => model('ActivityModel')->getAllDataActivities(),
            ]);
        } else {
            session()->setFlashdata('fail', 'Anda Belum Login atau Role Tidak Sama!');
            return redirect()->redirect('/login');
        }
    }
    
    public function listOfActivityByStaff($kode)
    {
        if (session()->get('level') == 'koordinator'){
            return view('/koordinator/daftar_pengajuan_aktivitas', [
                'daftar_pengajuan_title' => 'Daftar Pengajuan Aktivitas',
                'activity' => model('ActivityModel')->getAllDataActivities($kode),
            ]);
        } else {
            session()->setFlashdata('fail', 'Anda Belum Login atau Role Tidak Sama!');
            return redirect()->redirect('/login');
        }
    }
    
    public function approveActivity() 
    {
        if (session()->get('level') == 'koordinator'){
            $activity = new ActivityModel();
            var_dump( $this->request->getVar('id'));
            $activity->save([
                'status' => 1,
                'id' => $this->request->getVar('id'),
            ]);
            session()->setFlashdata('success', 'Aktivitas Berhasil Disetujui!');
            return redirect()->redirect("/koordinator/daftar_pengajuan_aktivitas");
        } else {
            session()->setFlashdata('fail', 'Anda Belum Login atau Role Tidak Sama!');
            return redirect()->redirect('/login');
        }
    }
    
    public function rejectActivity() 
    {
        if (session()->get('level') == 'koordinator'){
            $activity = new ActivityModel();
            var_dump( $this->request->getVar('id'));
            $activity->save([
                'status' => -1,
                'id' => $this->request->getVar('id'),
            ]);
            session()->setFlashdata('success', 'Aktivitas Berhasil Disetujui!');
            return redirect()->redirect("/koordinator/daftar_pengajuan_aktivitas");
        } else {
            session()->setFlashdata('fail', 'Anda Belum Login atau Role Tidak Sama!');
            return redirect()->redirect('/login');
        }
    }
    
    public function pengajuan()
    {
        if (session()->get('level') == 'staf') {
            $kode = session()->get('kode_user');
            return view('/staf/pengajuan', [
                'pengajuan_title' => 'Daftar Pengajuan Aktivitas',
                'add_title' => 'Pengajuan Aktivitas',
                'activity' => model('ActivityModel')->getAllDataActivities($kode),
            ]);
        } else {
            session()->setFlashdata('fail', 'Anda Belum Login!');
            return redirect()->redirect('/login');
        }
    }
    
    public function aktivitas()
    {
        if (session()->get('level') == 'staf') {
            $kode = session()->get('kode_user');
            return view('/staf/aktivitas', [
                'aktivitas_title' => 'Daftar Aktivitas',
                'activity' => model('ActivityModel')->getAllDataActiveActivities($kode),
            ]);
            // var_dump(model('ActivityModel')->getAllDataActiveActivities($kode));
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
            'kode_user' => session()->get('kode_user'),
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
