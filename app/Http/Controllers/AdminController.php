<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function index()
    {
        return view('archivos/ingresar');
    }

    public function sms()
    {
        return "asdsa";
    }

    public function home()
    {
        return view('admin.archivos.ingresar');
    }
}
