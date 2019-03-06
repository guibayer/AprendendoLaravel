<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        //Não esquecer do auth: alguma coisa, assim estaremos setando
        //um guard diferente
        $this->middleware('auth:admin');
    }

    public function index(){
        return view('admin');
    }
}
