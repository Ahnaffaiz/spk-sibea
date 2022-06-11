<?php

namespace App\Http\Livewire\Beasiswa;

use App\Models\Beasiswa;
use Livewire\Component;

class Create extends Component
{
    public $id_beasiswa, $nama, $sta, $sti, $sr1, $spa, $spi, $ska, $ski, $t01, $pa1, $pi1, $p01, $sj1;


    protected $listeners = [
        'delete'
    ];

    protected $rules = [
        'nama' => 'required',
        // 'sta' => 'required',
        // 'sti' => 'required',
        // 'sr1' => 'required',
        // 'spa' => 'required',
        // 'spi' => 'required',
        // 'ska' => 'required',
        // 'ski' => 'required',
        // 't01' => 'required',
        // 'pa1' => 'required',
        // 'pi1' => 'required',
        // 'p01' => 'required',
        // 'sj1' => 'required',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function render()
    {
        return view('livewire.beasiswa.create');
    }

    public function store()
    {   
        $this->validate($this->rules);

        Beasiswa::updateOrCreate([
            'id' => $this->id_beasiswa,
        ],
        [
            'nama' => $this->nama,
        ]
        );

        $this->resetInput();
        $this->dispatchBrowserEvent('createModalBeasiswa');
        $this->emit('beasiswaStore');
    }

    public function confirmDelete($id)
    {
        $this->beasiswa_id = $id;
        $this->alert('question', 'Apakah anda yakin akan menghapus beasiswa ini ?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Yes',
            'showCancelButton' => true,
            'cancelButtonText' => 'cancel',
            'icon' => 'warning',
            'onConfirmed' => 'delete',
            'timer' => null,
        ]);
    }

    public function delete($id) 
    {
        $beasiswa = Beasiswa::find($this->id_beasiswa);
        Beasiswa::destroy($beasiswa->id);
        $this->alert('success', 'Berhasil menghapus beasiswa');
    }

    public function show($id) 
    {
        $beasiswa = Beasiswa::find($id);
        $this->id_beaisswa = $beasiswa->id;
        $this->nama = $beasiswa->nama;
        $this->dispatchBrowserEvent('showCreateModalBeasiswa');
    }

    public function resetInput()
    {
        $this->nama=null;
    }
}
