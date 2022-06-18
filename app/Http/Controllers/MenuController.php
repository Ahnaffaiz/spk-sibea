<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\RefNilaiKriteria;
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

    public function kriteria()
    {
        $this->user = Auth::user();
        return view('pages.kriteria', ['user'=>$this->user]);
    }

    public function pendaftar()
    {
        $this->user = Auth::user();
        return view('pages.pendaftar', ['user'=>$this->user]);
    }

    public function pendaftarImport($id)
    {
        $this->user = Auth::user();
        $beasiswa = Beasiswa::find($id);
        return view('pages.pendaftar-import', ['user'=>$this->user, 'beasiswa'=>$beasiswa]);
    }

    public function skoring()
    {
        $this->user = Auth::user();
        return view('pages.skoring', ['user'=>$this->user]);
    }

    public function promethee($id)
    {
        $this->user = Auth::user();
        $beasiswa = Beasiswa::find($id);
        return view('pages.skoring.promethee', ['user'=>$this->user, 'beasiswa'=>$beasiswa]);
    }

    public function ahp($id)
    {
        $this->user = Auth::user();
        $beasiswa = Beasiswa::find($id);
        return view('pages.skoring.ahp', ['user'=>$this->user, 'beasiswa'=>$beasiswa]);
    }
}
