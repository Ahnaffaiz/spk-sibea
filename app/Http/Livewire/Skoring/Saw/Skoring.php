<?php

namespace App\Http\Livewire\Skoring\Saw;

use App\Models\Pendaftar;
use App\Models\Promethee\ProBobotKriteria;
use App\Models\RefKriteria;
use App\Models\SawAlternative;
use App\Models\SawNormalizedMatrix;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Skoring extends Component
{

    use LivewireAlert;

    public $user, $beasiswa; 

    public $pendaftars, $kriterias, $matriks_normalisasi, $matriks_ranking, $bobotKriterias;

    public $active_tab=0;

    protected $listeners = [
        'generate'
    ];

    public function mount()
    {
        $this->kriterias = RefKriteria::get();
        $this->bobotKriterias = ProBobotKriteria::where('beasiswas_id', $this->beasiswa->id)->get();

        $this->pendaftars = Pendaftar::where('beasiswas_id', $this->beasiswa->id)->orderBy('nama')->get();
        $this->matriks_normalisasi = SawAlternative::where('beasiswas_id', $this->beasiswa->id)->get()->sortBy(function($q){return $q->getPendaftar->nama;});
        $this->matriks_ranking = SawAlternative::where('beasiswas_id', $this->beasiswa->id)->orderBy('ranking', 'ASC')->get();
    }

    public function openTab($no)
    {
        $this->active_tab = $no;
    }

    public function render()
    {
        return view('livewire.skoring.saw.skoring');
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
        $this->alert('success', 'berhasil menentukan peringkat');
    }

    public function step1()
    {
        $pendaftars = Pendaftar::where('beasiswas_id', $this->beasiswa->id)->orderBy('nama', 'asc')->get();
        
        $nilai_maks = 
        [
                'sta' => $pendaftars->max('getsta.nilai'),
                'sti' => $pendaftars->max('getsti.nilai'),
                'spa' => $pendaftars->max('getspa.nilai'),
                'spi' => $pendaftars->max('getspi.nilai'),
                'ska' => $pendaftars->max('getska.nilai'),
                'ski' => $pendaftars->max('getski.nilai'),
                'sha' => $pendaftars->max('getsha.nilai'),
                'shi' => $pendaftars->max('getshi.nilai'),
                'sho' => $pendaftars->max('getsho.nilai'),
                'skr' => $pendaftars->max('getskr.nilai'),
                'sjt' => $pendaftars->max('getsjt.nilai'),
                'skj' => $pendaftars->max('getskj.nilai'),
            ];
        $nilai_min =
            [
                'sta' => $pendaftars->min('getsta.nilai'),
                'sti' => $pendaftars->min('getsti.nilai'),
                'spa' => $pendaftars->min('getspa.nilai'),
                'spi' => $pendaftars->min('getspi.nilai'),
                'ska' => $pendaftars->min('getska.nilai'),
                'ski' => $pendaftars->min('getski.nilai'),
                'sha' => $pendaftars->min('getsha.nilai'),
                'shi' => $pendaftars->min('getshi.nilai'),
                'sho' => $pendaftars->min('getsho.nilai'),
                'skr' => $pendaftars->min('getskr.nilai'),
                'sjt' => $pendaftars->min('getsjt.nilai'),
                'skj' => $pendaftars->min('getskj.nilai'),
            ];
        foreach ($pendaftars as $pendaftar) {
            $nilai_pendaftar =
            [
                'sta' => ($pendaftar->getsta != null) ? $pendaftar->getsta->nilai : 0,
                'sti' => ($pendaftar->getsti != null) ? $pendaftar->getsti->nilai : 0,
                'spa' => ($pendaftar->getska != null) ? $pendaftar->getska->nilai : 0,
                'spi' => ($pendaftar->getski != null) ? $pendaftar->getski->nilai : 0,
                'ska' => ($pendaftar->getspa != null) ? $pendaftar->getspa->nilai : 0,
                'ski' => ($pendaftar->getspi != null) ? $pendaftar->getspi->nilai : 0,
                'sha' => ($pendaftar->getsha != null) ? $pendaftar->getsha->nilai : 0,
                'shi' => ($pendaftar->getshi != null) ? $pendaftar->getshi->nilai : 0,
                'sho' => ($pendaftar->getsho != null) ? $pendaftar->getsho->nilai : 0,
                'skr' => ($pendaftar->getskr != null) ? $pendaftar->getskr->nilai : 0,
                'sjt' => ($pendaftar->getskj != null) ? $pendaftar->getskj->nilai : 0,
                'skj' => ($pendaftar->getskj != null) ? $pendaftar->getskj->nilai : 0,
            ];

            SawAlternative::updateOrCreate([
                    'beasiswas_id' => $this->beasiswa->id,
                    'pendaftars_id' => $pendaftar->id,
                ]
            );

            SawNormalizedMatrix::updateOrCreate([
                'saw_alternatives_id' => SawAlternative::select('id')->where('beasiswas_id', $this->beasiswa->id)->where('pendaftars_id', $pendaftar->id)->first()->id,
            ],[
                'sta' => $nilai_pendaftar['sta'],
                'sti' => $nilai_pendaftar['sti'],
                'ska' => $nilai_pendaftar['ska'],
                'ski' => $nilai_pendaftar['ski'],
                'spa' => $nilai_pendaftar['spa'],
                'spi' => $nilai_pendaftar['spi'],
                'sha' => $nilai_pendaftar['sha'],
                'shi' => $nilai_pendaftar['shi'],
                'sho' => $nilai_pendaftar['sho'],
                'skr' => $nilai_pendaftar['skr'],
                'sjt' => $nilai_pendaftar['sjt'],
                'skj' => $nilai_pendaftar['skj'],
            ]);
        }
        
    }

    public function step2()
    {
        $this->matriks_normalisasi = SawAlternative::where('beasiswas_id', $this->beasiswa->id)->get()->sortBy(function($q){return $q->getPendaftar->nama;});
        foreach ($this->matriks_normalisasi as $peserta) {
            $sta = $peserta->getNormalizedMatrices->sta * $this->bobotKriterias->where('getKriteria.kode','sta')->first()->bobot;
            $sti = $peserta->getNormalizedMatrices->sti * $this->bobotKriterias->where('getKriteria.kode','sti')->first()->bobot;
            $spa = $peserta->getNormalizedMatrices->spa * $this->bobotKriterias->where('getKriteria.kode','spa')->first()->bobot;
            $spi = $peserta->getNormalizedMatrices->spi * $this->bobotKriterias->where('getKriteria.kode','spi')->first()->bobot;
            $ska = $peserta->getNormalizedMatrices->ska * $this->bobotKriterias->where('getKriteria.kode','ska')->first()->bobot;
            $ski = $peserta->getNormalizedMatrices->ski * $this->bobotKriterias->where('getKriteria.kode','ski')->first()->bobot;
            $sha = $peserta->getNormalizedMatrices->sha * $this->bobotKriterias->where('getKriteria.kode','sha')->first()->bobot;
            $shi = $peserta->getNormalizedMatrices->shi * $this->bobotKriterias->where('getKriteria.kode','shi')->first()->bobot;
            $sho = $peserta->getNormalizedMatrices->sho * $this->bobotKriterias->where('getKriteria.kode','sho')->first()->bobot;
            $skr = $peserta->getNormalizedMatrices->skr * $this->bobotKriterias->where('getKriteria.kode','skr')->first()->bobot;
            $sjt = $peserta->getNormalizedMatrices->sjt * $this->bobotKriterias->where('getKriteria.kode','sjt')->first()->bobot;
            $skj = $peserta->getNormalizedMatrices->skj * $this->bobotKriterias->where('getKriteria.kode','skj')->first()->bobot;

            $total = array_sum([$sta,$sti,$spa,$spi,$ska,$ski,$sha,$shi,$sho,$skr,$sjt,$skj]);
            
            SawAlternative::where('beasiswas_id', $this->beasiswa->id)->where('id',$peserta->id)
            ->update([
                'total' => $total
            ]);
        }
        $this->matriks_normalisasi = SawAlternative::where('beasiswas_id', $this->beasiswa->id)->get()->sortBy(function($q){return $q->getPendaftar->nama;});
    }

    public function step3() 
    {
        $alternatives = SawAlternative::where('beasiswas_id', $this->beasiswa->id)->orderBy('total', 'DESC')->get();
        $counter=1;
        foreach ($alternatives as $alternative) {
            SawAlternative::where('id', $alternative->id)
            ->update([
                'ranking' => $counter
            ]);

            $is_accepted = 0;
            if($counter <= $this->beasiswa->kuota){
                $is_accepted = 1;
            }

            Pendaftar::where('id', $alternative->pendaftars_id)
            ->update([
                'ranking_actual' => $counter,
                'is_accepted_actual' => $is_accepted
            ]);
            $counter++;
        }

        $this->matriks_ranking = SawAlternative::where('beasiswas_id', $this->beasiswa->id)->orderBy('ranking', 'ASC')->get();
    }
}
