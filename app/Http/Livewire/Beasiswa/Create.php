<?php

namespace App\Http\Livewire\Beasiswa;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Create extends Component
{
    use LivewireAlert;

    public $user;
    public $beasiswas_id, $bobot, $total;

    public $step =1;


    protected $listeners = [
        'beasiswaStore',
        'bobotPrometheeStore',
        'bobotAhpStore',

        'backToBeasiswa',
        'backToPromethee',
    ];

    public function mount()
    {
        if(session()->has('beasiswas_id')){
            $this->beasiswas_id = session('beasiswas_id');
            $this->step = session('step');
        }
        if($this->beasiswas_id != null){
            session(['beasiswas_id' => $this->beasiswas_id]);
            session(['step' => $this->step]);
        } 
    }

    public function render()
    {
        return view('livewire.beasiswa.create');
    }

    public function add()
    {
        $this->resetInput();
        $this->dispatchBrowserEvent('showCreateModalBeasiswa');
    }

    public function beasiswaStore($id)
    {
        $this->beasiswas_id = $id;
        $this->step = 2;
        session(['step' => $this->step]);
        session(['beasiswas_id' => $this->beasiswas_id]);
    }

    public function bobotPrometheeStore()
    {
        $this->step = 3;
        session(['step' => $this->step]);
    }

    public function bobotAhpStore()
    {
        session()->forget('beasiswas_id');
        session()->forget('step');
        
        return redirect()->route('admin.beasiswa')->with('success', 'Berhasil Membuat Beasiswa');
    }

    public function backToBeasiswa()
    {
        $this->step = 1;
        session(['step' => $this->step]);
    }

    public function backToPromethee()
    {
        $this->step = 2;
        session(['step' => $this->step]);
    }
}
