<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function beasiswa()
    {
        $this->user = Auth::user();
        return view('pages.beasiswa', ['user'=>$this->user]);
    }
}
