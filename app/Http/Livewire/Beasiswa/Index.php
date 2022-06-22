<?php

namespace App\Http\Livewire\Beasiswa;

use App\Models\Beasiswa;
use Livewire\Component;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Index extends Component
{
    
    use LivewireAlert;
    use WithPagination;
    
    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    public $search;

    public $user;

    public $beasiswa_id;

    protected $listeners = [
        'beasiswaStore',
        'delete'
    ];

    public function render()
    {
        return view('livewire.beasiswa.index',[
            'beasiswas' => Beasiswa::where('nama', 'like', '%'.$this->search.'%')->orderBy('created_at', 'DESC')->paginate(5),
        ]);
    }

    public function confirmDelete($id)
    {
        $this->beasiswas_id = $id;
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

    public function delete() 
    {
        $beasiswa = Beasiswa::find($this->beasiswas_id);
        Beasiswa::destroy($beasiswa->id);
        
        $this->beasiswa_id = null;
        $this->alert('success', 'Berhasil menghapus beasiswa');
    }

    public function beasiswaStore()
    {
        $this->alert('success', 'Berhasil menambahkan beasiswa');
    }
}
