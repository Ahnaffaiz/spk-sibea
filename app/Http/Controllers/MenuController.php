<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function beasiswa(Request $request)
    {
        $request->session()->forget('beasiswas_id');
        $request->session()->forget('step');

        $this->user = Auth::user();
        return view('pages.beasiswa', ['user'=>$this->user]);
    }

    public function beasiswaCreate()
    {
        $this->user = Auth::user();
        return view('pages.beasiswa-create', ['user'=>$this->user]);
    }

    public function beasiswaUpdate($id)
    {
        $this->user = Auth::user();
        $beasiswa = Beasiswa::find($id);
        return view('pages.beasiswa-create', ['user'=>$this->user, 'beasiswa'=>$beasiswa]);
    }

    public function kriteriaPromethee()
    {
        $this->user = Auth::user();
        return view('pages.kriteria-promethee', ['user'=>$this->user]);
    }

    public function kriteriaAhp()
    {
        $this->user = Auth::user();
        return view('pages.kriteria-ahp', ['user'=>$this->user]);
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

    public function saw($id)
    {
        $this->user = Auth::user();
        $beasiswa = Beasiswa::find($id);
        return view('pages.skoring.saw', ['user'=>$this->user, 'beasiswa'=>$beasiswa]);
    }

    public function evaluasi()
    {
        $this->user = Auth::user();
        return view('pages.evaluasi', ['user'=>$this->user]);
    }

    public function evaluasiDetail($id)
    {
        $this->user = Auth::user();
        $beasiswa = Beasiswa::find($id);
        return view('pages.evaluasi-detail', ['user'=>$this->user, 'beasiswa'=>$beasiswa]);
    }
}
