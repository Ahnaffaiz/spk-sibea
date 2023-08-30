<?php

namespace App\Http\Livewire\Evaluasi;

use App\Models\Pendaftar;
use Livewire\Component;

class Detail extends Component
{
    public $beasiswa, $user;

    public $pendaftars_actual, $pendaftars_promethee, $pendaftars_ahp;

    public function mount()
    {
        $this->pendaftars_actual = Pendaftar::select('id','beasiswas_id', 'nama', 'is_accepted_ahp', 'is_accepted_promethee', 'is_accepted_actual', 'ranking_ahp', 'ranking_promethee', 'ranking_actual')
                                            ->orderBy('ranking_actual', 'asc')
                                            ->where('beasiswas_id', $this->beasiswa->id)->get();
        $this->pendaftars_ahp = Pendaftar::select('id','beasiswas_id', 'nama', 'is_accepted_ahp', 'is_accepted_promethee', 'is_accepted_actual', 'ranking_ahp', 'ranking_promethee', 'ranking_actual')
                                            ->orderBy('ranking_ahp', 'asc')
                                            ->where('beasiswas_id', $this->beasiswa->id)->get();
        $this->pendaftars_promethee = Pendaftar::select('id','beasiswas_id', 'nama', 'is_accepted_ahp', 'is_accepted_promethee', 'is_accepted_actual', 'ranking_ahp', 'ranking_promethee', 'ranking_actual')
                                            ->orderBy('ranking_promethee', 'asc')
                                            ->where('beasiswas_id', $this->beasiswa->id)->get();
    }

    public function render()
    {
        return view('livewire.evaluasi.detail');
    }
}
