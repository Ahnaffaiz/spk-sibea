<?php

namespace App\Http\Livewire\Skoring\Promethee;

use App\Models\Pendaftar;
use App\Models\Promethee\ProAlternative;
use App\Models\Promethee\ProBobotKriteria;
use App\Models\Promethee\ProDecisionMatrix;
use App\Models\Promethee\ProDiffMatrix;
use App\Models\RefKriteria;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Skoring extends Component
{
    use LivewireAlert;

    public $user, $beasiswa;

    public $kriterias, $bobotKriterias;

    public  $pendaftars,
            $matriks_normalisasi, 
            $matriks_diff, 
            $matriks_conditional, 
            $matriks_bobot_agregate, 
            $matriks_agregate, 
            $matriks_agregate_sementara,
            $matriks_ouranking,
            $matriks_ranking,
            $matriks_outranking;
    
    public $active_tab=0;

    protected $listeners = [
        'generate'
    ];

    public function mount()
    {
        $this->kriterias = RefKriteria::get();
        $this->bobotKriterias = ProBobotKriteria::where('beasiswas_id', $this->beasiswa->id)->get();
        $this->pendaftars = Pendaftar::where('beasiswas_id', $this->beasiswa->id)->orderBy('nama')->get();
        $this->matriks_normalisasi = ProAlternative::where('beasiswas_id', $this->beasiswa->id)->get()->sortBy(function($q){return $q->getPendaftar->nama;});
        $this->matriks_diff = ProDiffMatrix::where('beasiswas_id', $this->beasiswa->id)->get();
        $this->matriks_agregate = ProDiffMatrix::select('id', 'first_alternatives_id', 'second_alternatives_id', 'agregate_function')->where('beasiswas_id', $this->beasiswa->id)->get();
        $this->matriks_outranking = $this->matriks_normalisasi;
        $this->matriks_ranking = ProAlternative::select('id', 'pendaftars_id', 'outranking_flow','ranking')->where('beasiswas_id', $this->beasiswa->id)->orderBy('ranking', 'asc')->get();

        $this->step3();
        $this->step4();
        
    }

    public function openTab($no)
    {
        $this->active_tab = $no;
    }

    public function render()
    {
        return view('livewire.skoring.promethee.skoring');
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
        $this->step6();
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

            ProAlternative::updateOrCreate([
                    'beasiswas_id' => $this->beasiswa->id,
                    'pendaftars_id' => $pendaftar->id,
                ]
            );

            ProDecisionMatrix::updateOrCreate([
                'pro_alternatives_id' => ProAlternative::select('id')->where('beasiswas_id', $this->beasiswa->id)->where('pendaftars_id', $pendaftar->id)->first()->id,
            ],[
                 'sta' => round(($nilai_maks['sta'] -  $nilai_pendaftar['sta']) / ($nilai_maks['sta'] - $nilai_min['sta']), 3),
                 'sti' => round(($nilai_maks['sti'] -  $nilai_pendaftar['sti']) / ($nilai_maks['sti'] - $nilai_min['sti']), 3),
                 'ska' => round(($nilai_maks['ska'] -  $nilai_pendaftar['ska']) / ($nilai_maks['ska'] - $nilai_min['ska']), 3),
                 'ski' => round(($nilai_maks['ski'] -  $nilai_pendaftar['ski']) / ($nilai_maks['ski'] - $nilai_min['ski']), 3),
                 'spa' => round(($nilai_maks['spa'] -  $nilai_pendaftar['spa']) / ($nilai_maks['spa'] - $nilai_min['spa']), 3),
                 'spi' => round(($nilai_maks['spi'] -  $nilai_pendaftar['spi']) / ($nilai_maks['spi'] - $nilai_min['spi']), 3),
                 'sha' => round(($nilai_maks['sha'] -  $nilai_pendaftar['sha']) / ($nilai_maks['sha'] - $nilai_min['sha']), 3),
                 'shi' => round(($nilai_maks['shi'] -  $nilai_pendaftar['shi']) / ($nilai_maks['shi'] - $nilai_min['shi']), 3),
                 'sho' => round(($nilai_maks['sho'] -  $nilai_pendaftar['sho']) / ($nilai_maks['sho'] - $nilai_min['sho']), 3),
                 'skr' => round(($nilai_maks['skr'] -  $nilai_pendaftar['skr']) / ($nilai_maks['skr'] - $nilai_min['skr']), 3),
                 'sjt' => round(($nilai_pendaftar['sjt'] - $nilai_min['sjt'] ) / ($nilai_maks['sjt'] - $nilai_min['sjt']), 3),
                 'skj' => round(($nilai_maks['skj'] - $nilai_pendaftar['skj']) / ($nilai_maks['skj'] - $nilai_min['skj']), 3),
            ]);
        }
        
        $this->matriks_normalisasi = ProAlternative::where('beasiswas_id', $this->beasiswa->id)->get()->sortBy(function($q){return $q->getPendaftar->nama;});
    }

    public function step2()
    {
        foreach ($this->matriks_normalisasi as $alternative1) {
            foreach ($this->matriks_normalisasi as $alternative2) {
                if($alternative1 != $alternative2){
                    ProDiffMatrix::updateOrCreate([
                        'beasiswas_id' => $this->beasiswa->id,
                        'first_alternatives_id' => $alternative1->id,
                        'second_alternatives_id' => $alternative2->id,
                    ],[
                        'sta' => $alternative1->getDecisionMatrices->sta - $alternative2->getDecisionMatrices->sta,
                        'sti' => $alternative1->getDecisionMatrices->sti - $alternative2->getDecisionMatrices->sti,
                        'ska' => $alternative1->getDecisionMatrices->ska - $alternative2->getDecisionMatrices->ska,
                        'ski' => $alternative1->getDecisionMatrices->ski - $alternative2->getDecisionMatrices->ski,
                        'spa' => $alternative1->getDecisionMatrices->spa - $alternative2->getDecisionMatrices->spa,
                        'spi' => $alternative1->getDecisionMatrices->spi - $alternative2->getDecisionMatrices->spi,
                        'sha' => $alternative1->getDecisionMatrices->sha - $alternative2->getDecisionMatrices->sha,
                        'shi' => $alternative1->getDecisionMatrices->shi - $alternative2->getDecisionMatrices->shi,
                        'sho' => $alternative1->getDecisionMatrices->sho - $alternative2->getDecisionMatrices->sho,
                        'skr' => $alternative1->getDecisionMatrices->skr - $alternative2->getDecisionMatrices->skr,
                        'sjt' => $alternative1->getDecisionMatrices->sjt - $alternative2->getDecisionMatrices->sjt,
                        'skj' => $alternative1->getDecisionMatrices->skj - $alternative2->getDecisionMatrices->skj,
                    ]);
                }
            }
        }

        $this->matriks_diff = ProDiffMatrix::where('beasiswas_id', $this->beasiswa->id)->get();
    }

    public function step3()
    {
        $matriks_nilai = [];
        foreach ($this->matriks_diff as $item) {
            
            if($item->sta <= 0) {
                $matriks_nilai['sta'] = 0;
            } else {
                $matriks_nilai['sta'] = $item->sta;
            }

            if($item->sti <= 0) {
                $matriks_nilai['sti'] = 0;
            } else {
                $matriks_nilai['sti'] = $item->sti;
            }

            if($item->spa <= 0) {
                $matriks_nilai['spa'] = 0;
            } else {
                $matriks_nilai['spa'] = $item->spa;
            }

            if($item->spi <= 0) {
                $matriks_nilai['spi'] = 0;
            } else {
                $matriks_nilai['spi'] = $item->spi;
            }

            if($item->ska <= 0) {
                $matriks_nilai['ska'] = 0;
            } else {
                $matriks_nilai['ska'] = $item->ska;
            }

            if($item->ski <= 0) {
                $matriks_nilai['ski'] = 0;
            } else {
                $matriks_nilai['ski'] = $item->ski;
            }

            if($item->sha <= 0) {
                $matriks_nilai['sha'] = 0;
            } else {
                $matriks_nilai['sha'] = $item->sha;
            }

            if($item->shi <= 0) {
                $matriks_nilai['shi'] = 0;
            } else {
                $matriks_nilai['shi'] = $item->shi;
            }

            if($item->sho <= 0) {
                $matriks_nilai['sho'] = 0;
            } else {
                $matriks_nilai['sho'] = $item->sho;
            }

            if($item->skr <= 0) {
                $matriks_nilai['skr'] = 0;
            } else {
                $matriks_nilai['skr'] = $item->skr;
            }

            if($item->sjt <= 0) {
                $matriks_nilai['sjt'] = 0;
            } else {
                $matriks_nilai['sjt'] = $item->sjt;
            }

            if($item->skj <= 0) {
                $matriks_nilai['skj'] = 0;
            } else {
                $matriks_nilai['skj'] = $item->skj;
            }

            $this->matriks_conditional[$item->id] = $matriks_nilai;
        }
    }

    public function step4() {
        if($this->matriks_conditional != null){
            foreach ($this->matriks_conditional as $key => $value) {
                $sta = $value['sta'] * $this->bobotKriterias->where('getKriteria.kode','sta')->first()->bobot;
                $sti = $value['sti'] * $this->bobotKriterias->where('getKriteria.kode','sti')->first()->bobot;
                $spa = $value['spa'] * $this->bobotKriterias->where('getKriteria.kode','spa')->first()->bobot;
                $spi = $value['spi'] * $this->bobotKriterias->where('getKriteria.kode','spi')->first()->bobot;
                $ska = $value['ska'] * $this->bobotKriterias->where('getKriteria.kode','ska')->first()->bobot;
                $ski = $value['ski'] * $this->bobotKriterias->where('getKriteria.kode','ski')->first()->bobot;
                $sha = $value['sha'] * $this->bobotKriterias->where('getKriteria.kode','sha')->first()->bobot;
                $shi = $value['shi'] * $this->bobotKriterias->where('getKriteria.kode','shi')->first()->bobot;
                $sho = $value['sho'] * $this->bobotKriterias->where('getKriteria.kode','sho')->first()->bobot;
                $skr = $value['skr'] * $this->bobotKriterias->where('getKriteria.kode','skr')->first()->bobot;
                $sjt = $value['sjt'] * $this->bobotKriterias->where('getKriteria.kode','sjt')->first()->bobot;
                $skj = $value['skj'] * $this->bobotKriterias->where('getKriteria.kode','skj')->first()->bobot;

                $agregate_func = round(array_sum([$sta,$sti,$spa,$spi,$ska,$ski,$sha,$shi,$sho,$skr,$sjt,$skj])/$this->bobotKriterias->count('bobot'),3);
                $this->matriks_bobot_agregate[$key] = [
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
                    'agregate' => $agregate_func
                ];

                // dd($sta+$sti+$spa+$spi+$ska+$ski+$sha+$shi+$sho+$skr+$sjt+$skj . $sta . ', ' . $sti . ', ' . $spa . ', ' .$spi . ', ' . $ska  . ', ' . $ski . ', ' . $sha . ', ' . $shi . ', ' . $sho . ', ' . $skr . ', ' . $sjt . ', ' . $skj );
                // dd($sta . ', ' . $sti . ', ' . $spa . ', ' .$spi . ', ' . $ska  . ', ' . $ski . ', ' . $sha . ', ' . $shi . ', ' . $sho . ', ' . $skr . ', ' . $sjt . ', ' . $skj . '   ,    ' . array_sum([$sta,$sti,$spa,$spi,$ska,$ski,$sha,$shi,$sho,$skr,$sjt,$skj]));
                // dd(array_sum([$sta,$sti,$spa,$spi,$ska,$ski,$sha,$shi,$sho,$skr,$sjt,$skj]));
                $this->matriks_agregate_sementara[$key] = $agregate_func;
            }
        }
    }

    public function step5()
    {
        foreach ($this->matriks_agregate_sementara as $key => $value) {
            ProDiffMatrix::where('id', $key)->update([
                'agregate_function' => $value
            ]);
        }

        $this->matriks_agregate = ProDiffMatrix::select('id', 'first_alternatives_id', 'second_alternatives_id', 'agregate_function')->where('beasiswas_id', $this->beasiswa->id)->get();

        $pendaftars = ProAlternative::where('beasiswas_id', $this->beasiswa->id)->get();
        $n = $pendaftars->count();
        foreach ($pendaftars as $item) {
            $leaving_flow = round(1/($n-1) * $this->matriks_agregate->where('first_alternatives_id', $item->id)->sum('agregate_function'),3);
            $entering_flow = round(1/($n-1) * $this->matriks_agregate->where('second_alternatives_id', $item->id)->sum('agregate_function'),3);
            ProAlternative::where('id', $item->id)
                ->update([
                    'leaving_flow' => $leaving_flow,
                    'entering_flow' => $entering_flow,
                    'outranking_flow' => $leaving_flow - $entering_flow
                ]);
        }
        $this->matriks_outranking = ProAlternative::where('beasiswas_id', $this->beasiswa->id)->get()->sortBy(function($q){return $q->getPendaftar->nama;});
    }

    public function step6()
    {
        
        $ranking = ProAlternative::where('beasiswas_id', $this->beasiswa->id)->orderBy('outranking_flow', 'desc')->get();
        
        $counter=1;
        foreach ($ranking as $item) {
            ProAlternative::where('id', $item->id)
                ->update([
                    'ranking' => $counter,
                ]);
            $is_accepted = 0;
            if($counter <= $this->beasiswa->kuota){
                $is_accepted = 1;
            }
            Pendaftar::where('id', $item->pendaftars_id)
                ->update([
                    'is_accepted_promethee' => $is_accepted,
                    'ranking_promethee' => $counter
                ]);
            $counter++;
        }

        $this->matriks_ranking = ProAlternative::select('id', 'pendaftars_id','outranking_flow','ranking')->where('beasiswas_id', $this->beasiswa->id)->orderBy('ranking', 'asc')->get();
    }
}
