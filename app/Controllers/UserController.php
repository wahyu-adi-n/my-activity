<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Controllers\BaseController;

class UserController extends BaseController
{
    public function login()
    {
        return view('user/login');
    }
    
    public function register()
    {
        return view('user/register');
    }
    
    public function loginProcess()
    {
        $user = new  UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $cek = $user->login($email, $password);
        if ($cek == 'NULL' || $cek == 'null' || $cek == null) {
            session()->setFlashdata('fail', 'Email atau Password Salah!');
            return redirect()->redirect("/login");
        } else {
            session()->set([
                'nama' => $cek['nama'],
                'level' => $cek['level'],
                'email' => $cek['email']
            ]);
            session()->setFlashdata('success', 'Anda Berhasil Login!');
            return redirect()->redirect("/dashboard");
        }
    }
    
    public function registerProcess()
    {  
        $user = new UserModel();
        $email = $this->request->getVar('email');
        $check =  $user->cek($email);
        if ($check == 'NULL' || $check == 'null' || $check == null) {
            $level = $this->request->getVar('level');
            $user->save([
                'kode_user' => ($level == "staf")? "staf-".md5(random_int(1,100)) : "koord-".md5(random_int(1,100)),
                'nama' => $this->request->getVar('nama'),
                'email' => $this->request->getVar('email'),
                'password' => $this->request->getVar('password'),
                'level' => $level,
            ]);
            session()->setFlashdata('success', 'Data User Berhasil Didaftarkan!');
            return redirect()->redirect("/login");
        } else {
            session()->setFlashdata('fail', 'Data User Sudah Terdaftar!');
            return redirect()->redirect("/register");
        } 
    }
    
    public function logout()
    {
        $array_items = ['nama', 'email', 'level'];
        session()->remove($array_items);
        session()->setFlashdata('success', 'Anda Berhasil Logout!');
        return redirect()->redirect("/login");
    }
}
