<?php

namespace App\Http\Livewire\Beasiswa;

use App\Models\Beasiswa;
use App\Models\Promethee\ProBobotKriteria;
use App\Models\RefKriteria;
use Livewire\Component;

class CreatePromethee extends Component
{
    public $user;
    
    public  $beasiswas_id, $bobot, $total;

    protected $rules = [
        'bobot.sta' => 'required',
        'bobot.sti' => 'required',
        'bobot.skr' => 'required',
        'bobot.spa' => 'required',
        'bobot.spi' => 'required',
        'bobot.ska' => 'required',
        'bobot.ski' => 'required',
        'bobot.sjt' => 'required',
        'bobot.sha' => 'required',
        'bobot.shi' => 'required',
        'bobot.sho' => 'required',
        'bobot.skj' => 'required',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function updatedBobot()
    {
        $this->total = 0;
        foreach ($this->bobot as $key => $value) {
            if(is_numeric($value)){
                $this->total += $value;
            }
        }
    }

    public function mount()
    {
        if($this->beasiswas_id) {
            $this->show($this->beasiswas_id);
        }
    }

    public function render()
    {
        return view('livewire.beasiswa.create-promethee');
    }

    public function store()
    {   
        $this->validate($this->rules);
        foreach ($this->bobot as $key => $value) {
            $kriteria = RefKriteria::where('kode', strtolower($key))->first();
            ProBobotKriteria::updateOrCreate([
                    'beasiswas_id' => $this->beasiswas_id,
                    'ref_kriterias_id' => $kriteria->id,
                ],
                [
                    'bobot' => $value
                ]
            );
        }

        $this->resetInput();
        $this->emit('bobotPrometheeStore');
    }

    public function show($id)
    {
        $this->resetInput();

        $beasiswa = Beasiswa::find($id);
        foreach ($beasiswa->getBobot as $bobot) {
            $this->bobot[strtolower($bobot->getKriteria->kode)] = $bobot->bobot;
            $this->total += $bobot->bobot;
        }
    }

    public function resetInput()
    {
        $this->bobot=null;
        $this->total=null;
    }

}
