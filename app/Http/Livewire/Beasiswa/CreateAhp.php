<?php

namespace App\Http\Livewire\Beasiswa;

use App\Models\Ahp\AhpPerbandinganKriteria;
use App\Models\Beasiswa;
use App\Models\RefKriteria;
use Livewire\Component;
use PhpParser\Node\Expr\Cast\Double;

class CreateAhp extends Component
{

    public $beasiswas_id, $bobot;
    public $kriterias = ['sta', 'sti', 'spa', 'spi', 'ska', 'ski', 'sha', 'shi', 'sho', 'skr', 'sjt', 'skj'];


    public function updatedBobot()
    {
        foreach ($this->kriterias as $kriteria1) {
            foreach ($this->kriterias as $kriteria2) {
                if($kriteria1 != $kriteria2) {
                    if($this->bobot[$kriteria1][$kriteria2] == 0 || $this->bobot[$kriteria1][$kriteria2] == null) {
                        
                    } else {
                        $this->bobot[$kriteria2][$kriteria1] = 1/(Double)$this->bobot[$kriteria1][$kriteria2];
                    }
                } 
            }
        }
    }

    protected function rules()
    {
        $rules=[];
        foreach ($this->kriterias as $kriteria1) {
            foreach ($this->kriterias as $kriteria2) {
                $rules['bobot.'.$kriteria1.'.'.$kriteria2] = 'required';
                $rules['bobot.'.$kriteria2.'.'.$kriteria1] = 'required';
            }
        }
        return $rules;
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function mount()
    {
        foreach ($this->kriterias as $kriteria1) {
            foreach ($this->kriterias as $kriteria2) {
                $this->bobot[$kriteria1][$kriteria2] = 0;
                $this->bobot[$kriteria2][$kriteria1] = 0;
                if($kriteria1 == $kriteria2) {
                    $this->bobot[$kriteria1][$kriteria2] = 1;
                }
            }
        }

        if($this->beasiswas_id) {
            $this->show($this->beasiswas_id);
        }
    }

    public function render()
    {
        return view('livewire.beasiswa.create-ahp');
    }

    public function store()
    {   
        $this->validate();
        foreach ($this->bobot as $key1 => $value1) {
            foreach ($value1 as $key2 => $value2) {
                AhpPerbandinganKriteria::updateOrCreate([
                    'beasiswas_id' => $this->beasiswas_id,
                    'first_ref_kriterias_id' => RefKriteria::select('id')->where('kode', strtolower($key1))->first()->id,
                    'last_ref_kriterias_id' => RefKriteria::select('id')->where('kode', strtolower($key2))->first()->id,
                    'bobot' => $value2
                ]);
            }
        }

        $this->resetInput();
        $this->emit('bobotAhpStore');
    }

    public function show($id) {

        $beasiswa = Beasiswa::find($id);
        if($beasiswa->getAhpBobot->count() > 0){
            foreach ($beasiswa->getAhpBobot as $bobot) {
                $this->bobot[strtolower($bobot->getFirstKriteria->kode)][strtolower($bobot->getLastKriteria->kode)] = $bobot->bobot;
            }
        };
        
    }

    public function resetInput() 
    {
        $this->bobot = null;
    }
}
