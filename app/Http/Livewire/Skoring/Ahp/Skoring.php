<?php

namespace App\Http\Livewire\Skoring\Ahp;

use App\Models\AhpAlternative;
use App\Models\AhpJumlahKriteria;
use App\Models\AhpNilaiKriteria;
use App\Models\AhpPerbandinganKriteria;
use App\Models\AhpRandomIndex;
use App\Models\Pendaftar;
use App\Models\RefKriteria;
use App\Models\RefNilaiKriteria;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Skoring extends Component
{

    use LivewireAlert;

    public $beasiswa;

    public  $pendaftars,
            $kriterias, 
            $matriks_perbandingan_kriterias, 
            $total_bobots, 
            $matriks_nilai_kriterias, 
            $konsistensi, 
            $nilai_prioritas_kriterias;

    public $jumlah_kriterias, $RI_tables;

    public $ref_nilai_kriterias, $ref_kriterias;

    protected $listeners = [
        'generate'
    ];

    public function mount()
    {
        $this->pendaftars = Pendaftar::where('beasiswas_id', $this->beasiswa->id)->get();
        $this->kriterias = RefKriteria::get();
        $this->matriks_perbandingan_kriterias = AhpPerbandinganKriteria::where('beasiswas_id', $this->beasiswa->id)->get();
        $this->matriks_nilai_kriterias = $this->matriks_perbandingan_kriterias;
        $this->jumlah_kriterias = AhpJumlahKriteria::where('beasiswas_id', $this->beasiswa->id)->get();
        
        $this->nilai_prioritas_kriterias = AhpNilaiKriteria::get();
        $this->ref_kriterias = RefKriteria::get();
        $this->ref_nilai_kriterias = RefNilaiKriteria::get();

        $this->matriks_ranking = AhpAlternative::select('id', 'pendaftars_id','ranking')->where('beasiswas_id', $this->beasiswa->id)->orderBy('ranking', 'asc')->get();
        
        $this->step1();
        $this->step3();
    }
    public function render()
    {
        return view('livewire.skoring.ahp.skoring');
    }

    public function generateAlert()
    {
        $this->alert('question', 'Apakah anda yakin akan menggenerate ranking ?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' => 'Iya',
            'showCancelButton' => true,
            'cancelButtonText' => 'Tidak',
            'icon' => 'warning',
            'onConfirmed' => 'generate',
            'timer' => null,
        ]);
    }

    public function generate()
    {
        $this->step1();
        $this->step2();
        $this->step3();
        $this->step4();
        $this->step5();
        $this->alert('success', 'berhasil menentukan peringkat');
    }

    public function step1()
    {
        foreach ($this->kriterias as $item1) {
            $this->total_bobots[$item1->kode] = $this->matriks_perbandingan_kriterias
                                                ->where('last_ref_kriterias_id', $item1->id)->sum('bobot');
        }
    }

    public function step2()
    {
        foreach ($this->kriterias as $item1) {

            //nilai setiap kriteria
            foreach ($this->kriterias as $item2) {
                $bobot = $this->matriks_nilai_kriterias->where('first_ref_kriterias_id', $item1->id)->where('last_ref_kriterias_id', $item2->id)->first()->bobot;
                $nilai = $bobot / $this->total_bobots[$item2->kode];
                AhpPerbandinganKriteria::where('beasiswas_id',$this->beasiswa->id,)
                    ->where('first_ref_kriterias_id', $item1->id)
                    ->where('last_ref_kriterias_id', $item2->id)
                    ->update(['nilai' => $nilai]);
            }

            //jumlah pada setiap kriteria
            $kriteria = AhpPerbandinganKriteria::where('beasiswas_id', $this->beasiswa->id)->where('first_ref_kriterias_id', $item1->id)->get();
            $jumlah = $kriteria->sum('nilai');
            $prioritas = $jumlah / $this->kriterias->count();
            $eigen =  $this->total_bobots[$item1->kode] * $prioritas; 

            AhpJumlahKriteria::updateOrCreate(
                [
                    'beasiswas_id' => $this->beasiswa->id,
                    'ref_kriterias_id' => $item1->id
                ],
                [
                    'jumlah' => $jumlah,
                    'prioritas' => $prioritas,
                    'eigen' => $eigen
                ]);
            }
        
        $this->jumlah_kriterias = AhpJumlahKriteria::where('beasiswas_id', $this->beasiswa->id)->get();
        $this->matriks_nilai_kriterias = AhpPerbandinganKriteria::where('beasiswas_id', $this->beasiswa->id)->get();

    }

    public function step3()
    {
        $konsistensi_index = ($this->jumlah_kriterias->sum('eigen') - $this->jumlah_kriterias->sum('jumlah'))/($this->kriterias->count() - 1);
        $this->RI_tables = AhpRandomIndex::all();
        $random_index = $this->RI_tables->where('ukuran_matriks', $this->kriterias->count())->first()->random_indek;
        $konsistensi_rasio =$konsistensi_index/$random_index;
        $konsisten = 'TIDAK KONSISTEN';
        if($konsistensi_rasio <= 0.1) {
            $konsisten = 'KONSISTEN';
        }

        
        $this->konsistensi['konsistensi_index'] = $konsistensi_index;
        $this->konsistensi['random_index'] = $random_index;
        $this->konsistensi['konsistensi_rasio'] = $konsistensi_rasio;
        $this->konsistensi['konsisten'] = $konsisten;
    }

    public function step4()
    {

        if($this->nilai_prioritas_kriterias->count() < 1) {
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
            $this->nilai_prioritas_kriterias = AhpNilaiKriteria::get();
        }
    }

    public function step5()
    {
        $pendaftars = Pendaftar::where('beasiswas_id', $this->beasiswa->id)->get();
        
        foreach ($pendaftars as $pendaftar) {
            $sta = $this->jumlah_kriterias->where('ref_kriterias_id', $pendaftar->getsta->getKriteria->first()->id)->first()->prioritas * $this->nilai_prioritas_kriterias->where('ref_nilai_kriterias_id', $pendaftar->sta)->first()->prioritas;
            $sti = $this->jumlah_kriterias->where('ref_kriterias_id', $pendaftar->getsti->getKriteria->first()->id)->first()->prioritas * $this->nilai_prioritas_kriterias->where('ref_nilai_kriterias_id', $pendaftar->sti)->first()->prioritas;
            $spa = $this->jumlah_kriterias->where('ref_kriterias_id', $pendaftar->getspa->getKriteria->first()->id)->first()->prioritas * $this->nilai_prioritas_kriterias->where('ref_nilai_kriterias_id', $pendaftar->spa)->first()->prioritas;
            $spi = $this->jumlah_kriterias->where('ref_kriterias_id', $pendaftar->getspi->getKriteria->first()->id)->first()->prioritas * $this->nilai_prioritas_kriterias->where('ref_nilai_kriterias_id', $pendaftar->spi)->first()->prioritas;
            $ska = $this->jumlah_kriterias->where('ref_kriterias_id', $pendaftar->getska->getKriteria->first()->id)->first()->prioritas * $this->nilai_prioritas_kriterias->where('ref_nilai_kriterias_id', $pendaftar->ska)->first()->prioritas;
            $ski = $this->jumlah_kriterias->where('ref_kriterias_id', $pendaftar->getski->getKriteria->first()->id)->first()->prioritas * $this->nilai_prioritas_kriterias->where('ref_nilai_kriterias_id', $pendaftar->ski)->first()->prioritas;
            $sha = $this->jumlah_kriterias->where('ref_kriterias_id', $pendaftar->getsha->getKriteria->first()->id)->first()->prioritas * $this->nilai_prioritas_kriterias->where('ref_nilai_kriterias_id', $pendaftar->sha)->first()->prioritas;
            $shi = $this->jumlah_kriterias->where('ref_kriterias_id', $pendaftar->getshi->getKriteria->first()->id)->first()->prioritas * $this->nilai_prioritas_kriterias->where('ref_nilai_kriterias_id', $pendaftar->shi)->first()->prioritas;
            $sho = $this->jumlah_kriterias->where('ref_kriterias_id', $pendaftar->getsho->getKriteria->first()->id)->first()->prioritas * $this->nilai_prioritas_kriterias->where('ref_nilai_kriterias_id', $pendaftar->sho)->first()->prioritas;
            $skr = $this->jumlah_kriterias->where('ref_kriterias_id', $pendaftar->getskr->getKriteria->first()->id)->first()->prioritas * $this->nilai_prioritas_kriterias->where('ref_nilai_kriterias_id', $pendaftar->skr)->first()->prioritas;
            $sjt = $this->jumlah_kriterias->where('ref_kriterias_id', $pendaftar->getsjt->getKriteria->first()->id)->first()->prioritas * $this->nilai_prioritas_kriterias->where('ref_nilai_kriterias_id', $pendaftar->sjt)->first()->prioritas;
            $skj = $this->jumlah_kriterias->where('ref_kriterias_id', $pendaftar->getskj->getKriteria->first()->id)->first()->prioritas * $this->nilai_prioritas_kriterias->where('ref_nilai_kriterias_id', $pendaftar->skj)->first()->prioritas;

            $total = $sta + $sti + $spa + $spi + $ska + $ski + $sha + $shi + $sho + $skr + $sjt + $skj;
            AhpAlternative::updateOrCreate([
                'pendaftars_id' => $pendaftar->id,
                'beasiswas_id' => $this->beasiswa->id
            ],[
                'sta' => $sta,
                'sti' => $sti,
                'spa' => $spa,
                'spi' => $spi,
                'ska' => $ska,
                'ski' => $ski,
                'sha' => $sha,
                'shi' => $shi,
                'sho' => $sho,
                'skr' => $skr,
                'sjt' => $sjt,
                'skj' => $skj,
                'total' => $total
            ]);
        }

        $alternatives = AhpAlternative::where('beasiswas_id', $this->beasiswa->id)->orderBy('total', 'DESC')->get();
        
        $counter = 1;
        foreach ($alternatives as $alternative) {
            AhpAlternative::where('id', $alternative->id)
                ->update([
                    'ranking' => $counter
                ]);
            
            $is_accepted = 0;
            if($counter <= $this->beasiswa->kuota){
                $is_accepted = 1;
            }
            Pendaftar::where('id', $alternative->pendaftars_id)
                ->update([
                    'is_accepted_ahp' => $is_accepted,
                    'ranking_ahp' => $counter
                ]);
            $counter++;
        }

        $this->matriks_ranking = AhpAlternative::where('beasiswas_id', $this->beasiswa->id)->orderBy('ranking', 'asc')->get();
    }
}
