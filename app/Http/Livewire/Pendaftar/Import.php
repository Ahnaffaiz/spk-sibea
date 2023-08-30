<?php

namespace App\Http\Livewire\Pendaftar;

use App\Imports\PendaftarImport;
use App\Models\Pendaftar;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Import extends Component
{
    use WithPagination;
    use LivewireAlert;
    use WithFileUploads;

    public $user, $beasiswa;

    public $data, $is_update;

    public $pendaftars_id;

    public $loading=false;

    public $search;

    protected $listeners = [
        'delete',
        'deleteAll',
        'import',
    ];

    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    protected $rules  = [
        'data' => 'required|mimes:csv,xls,xlsx',
    ];


    public function render()
    {
        return view('livewire.pendaftar.import',[
            'pendaftars' => Pendaftar::where('beasiswas_id', $this->beasiswa->id)->where("nama","like","%".strtolower($this->search)."%")->orderBy('nama', 'ASC')->paginate(10),
            'jmlPendaftar' => Pendaftar::select('id')->where('beasiswas_id', $this->beasiswa->id)->get()
        ]);
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function confirmImport()
    {
        $this->alert('question', 'Apakah anda yakin mengimport data ini ?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Yes',
            'showCancelButton' => true,
            'cancelButtonText' => 'cancel',
            'icon' => 'warning',
            'onConfirmed' => 'import',
            'timer' => null,
        ]);
    }

    public function import()
    {
        $this->loading = true;
        $this->validate($this->rules);

        $update_status = false;
        if($this->is_update == 'true') {
            $update_status = true;
        }

        Excel::import(new PendaftarImport($this->beasiswa->id, $update_status), $this->data);
        
        $this->resetField();
        $this->alert('success', 'Berhasil import data pendaftar');
        $this->loading = false;
    }

    public function confirmDelete($id)
    {
        $this->pendaftars_id = $id;
        $this->alert('question', 'Apakah anda yakin akan menghapus pendaftar ini ?', [
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
        $pendaftar = Pendaftar::find($this->pendaftars_id);
        Pendaftar::destroy($pendaftar->id);
        
        $this->pendaftars_id = null;
        $this->alert('success', 'Data pendaftar berhasil dihapus');
    }

    public function confirmDeleteAll()
    {
        $this->alert('question', 'Apakah anda yakin akan menghapus semua pendaftar ini ?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Yes',
            'showCancelButton' => true,
            'cancelButtonText' => 'cancel',
            'icon' => 'warning',
            'onConfirmed' => 'deleteAll',
            'timer' => null,
        ]);
    }
    public function deleteAll()
    {
        $pendaftars = Pendaftar::where('beasiswas_id', $this->beasiswa->id)->get();
        foreach ($pendaftars as $pendaftar) {
            Pendaftar::destroy($pendaftar->id);
        }
        $this->alert('success', 'Data pendaftar berhasil dihapus');

    }

    public function resetField()
    {
        $this->data = null;
        $this->is_update = null;
        $this->pendaftars_id = null;
    }
}
