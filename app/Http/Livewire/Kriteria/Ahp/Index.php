<?php

namespace App\Http\Livewire\Kriteria\Ahp;

use App\Models\Ahp\AhpNilaiKriteria;
use App\Models\RefKriteria;
use App\Models\RefNilaiKriteria;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{
    use LivewireAlert;

    public $user;

    public $nilai_kriterias;

    public function mount()
    {
        $this->ref_kriterias = RefKriteria::get();
        $this->ref_nilai_kriterias = RefNilaiKriteria::get();
    }

    public function render()
    {
        return view('livewire.kriteria.ahp.index', [
            'ahp_nilai_kriterias' => AhpNilaiKriteria::get()
        ]);
    }

    public function generatePrioritas()
    {
        foreach ($this->ref_kriterias as $kriteria) {
            $nilai_kriterias = $this->ref_nilai_kriterias->where('ref_kriterias_id', $kriteria->id);
            $nilai_total = $nilai_kriterias->sum('nilai');
            foreach($nilai_kriterias as $nilai){
                AhpNilaiKriteria::updateOrCreate([
                    'ref_nilai_kriterias_id' => $nilai->id,
                ],[
                    'prioritas' => $nilai->nilai/$nilai_total
                ]);
            }
        }

        $this->alert('success', 'Berhasil Mengenerate Bobot AHP');
    }
}
