<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('greeting', ['name' => 'Rafli dari Controller']);
    }

    public function create(){
        return 'fungsi tambah';
    }

}
