<?php

namespace App\Http\Livewire\Beasiswa;

use App\Models\Beasiswa;
use Livewire\Component;

class CreateBeasiswa extends Component
{
    public $user;
    
    public $beasiswas_id, $nama, $kuota;

    protected $rules = [
        'nama' => 'required',
        'kuota' => 'required|integer',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function mount()
    {
        if($this->beasiswas_id) {
            $this->show($this->beasiswas_id);
        }
    }

    public function render()
    {
        return view('livewire.beasiswa.create-beasiswa');
    }

    public function store()
    {   
        $this->validate($this->rules);

        if($this->beasiswas_id == null) {
            $beasiswa = Beasiswa::create([
                'nama' => strtolower($this->nama),
                'kuota' => $this->kuota
            ]);
        } else {
            $beasiswa = Beasiswa::updateOrCreate([
                    'id' => $this->beasiswas_id,
                ],
                [
                    'nama' => strtolower($this->nama),
                    'kuota' => $this->kuota,
                ]
            );
        }
        $this->beasiswas_id = $beasiswa->id;
        $this->resetInput();
        $this->emit('beasiswaStore', $this->beasiswas_id);
    }

    public function show($id) 
    {
        $this->resetInput();

        $beasiswa = Beasiswa::find($id);
        $this->beasiswas_id = $beasiswa->id;
        $this->nama = $beasiswa->nama;
        $this->kuota = $beasiswa->kuota;
    }

    public function resetInput()
    {
        $this->nama=null;
        $this->kuota=null;
    }
}
