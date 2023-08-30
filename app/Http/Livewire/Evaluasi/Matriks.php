<?php

namespace App\Http\Livewire\Evaluasi;

use App\Models\Pendaftar;
use Livewire\Component;

class Matriks extends Component
{
    public $beasiswa, $user;

    public $promethee, $ahp;

    public function mount() {
        $this->getConfutionMatrixAhp();
        $this->getConfutionMatrixPromethee();
    }

    public function render()
    {
        return view('livewire.evaluasi.matriks');
    }

    public function getConfutionMatrixAhp()
    {
        $this->ahp['TP'] = Pendaftar::where('beasiswas_id', $this->beasiswa->id)->where('is_accepted_actual', true)->where('is_accepted_ahp', true)->get()->count();
        $this->ahp['TN'] = Pendaftar::where('beasiswas_id', $this->beasiswa->id)->where('is_accepted_actual', false)->where('is_accepted_ahp', false)->get()->count();
        $this->ahp['FP'] = Pendaftar::where('beasiswas_id', $this->beasiswa->id)->where('is_accepted_actual', false)->where('is_accepted_ahp', true)->get()->count();
        $this->ahp['FN'] = Pendaftar::where('beasiswas_id', $this->beasiswa->id)->where('is_accepted_actual', true)->where('is_accepted_ahp', false)->get()->count();
        

        $accuration = round(($this->ahp['TP'] + $this->ahp['TN'])/($this->ahp['TP'] + $this->ahp['FP'] + $this->ahp['FN'] + $this->ahp['TN']) * 100, 2);
        $precission = round($this->ahp['TP']/($this->ahp['TP'] + $this->ahp['FP']) * 100, 2);
        $sensitifity = round($this->ahp['TP']/($this->ahp['TP']+$this->ahp['FN']) * 100, 2);
        $fscore = round(2 * $sensitifity * $precission / ($sensitifity + $precission), 2);
        
        $this->ahp['accuration'] = $accuration;
        $this->ahp['precission'] = $precission;
        $this->ahp['sensitifity'] = $sensitifity;
        $this->ahp['fscore'] =$fscore;
    }

    public function getConfutionMatrixPromethee()
    {
        $this->promethee['TP'] = Pendaftar::where('beasiswas_id', $this->beasiswa->id)->where('is_accepted_actual', true)->where('is_accepted_promethee', true)->get()->count();
        $this->promethee['TN'] = Pendaftar::where('beasiswas_id', $this->beasiswa->id)->where('is_accepted_actual', false)->where('is_accepted_promethee', false)->get()->count();
        $this->promethee['FP'] = Pendaftar::where('beasiswas_id', $this->beasiswa->id)->where('is_accepted_actual', false)->where('is_accepted_promethee', true)->get()->count();
        $this->promethee['FN'] = Pendaftar::where('beasiswas_id', $this->beasiswa->id)->where('is_accepted_actual', true)->where('is_accepted_promethee', false)->get()->count();
        
        $accuration = round(($this->promethee['TP'] + $this->promethee['TN'])/($this->promethee['TP'] + $this->promethee['FP'] + $this->promethee['FN'] + $this->promethee['TN']) * 100, 2); 
        $precission = round($this->promethee['TP']/($this->promethee['TP'] + $this->promethee['FP']) * 100, 2);
        $sensitifity = round($this->promethee['TP']/($this->promethee['TP']+$this->promethee['FN']) * 100, 2);
        $fscore = round(2 * $sensitifity * $precission / ($sensitifity + $precission), 2);
        
        $this->promethee['accuration'] = $accuration;
        $this->promethee['precission'] = $precission;
        $this->promethee['sensitifity'] = $sensitifity;
        $this->promethee['fscore'] =$fscore;
    }
}
