<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ActivityController extends BaseController
{
    public function dashboard()
    {
        return view('activity/index');
    }
    
    public function addActivity()
    {
        return view('activity/add_activity');
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
