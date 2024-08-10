<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function pendaftar()
    {
        $users =  user::get();
        return View ('admin.pendaftar.index',[
            'user'=> $users
        ]);
    }


    public function store()
    {
        $users =  user::get();
        return View ('admin.pendaftar.index',[
            'user'=> $users
        ]);
    }
}
