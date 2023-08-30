<?php

namespace App\Imports;

use App\Models\Pendaftar;
use App\Models\RefNilaiKriteria;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PendaftarImport implements ToModel, WithHeadingRow
{

    public $beasiswas_id, $is_update, $nilai;

    public function __construct($id, $cond)
    {
        $this->beasiswas_id = $id;
        $this->is_update = $cond;
        $this->nilai = RefNilaiKriteria::with('getKriteria')->get();
    }
    public function model(array $row)
    {
        $pendaftar = new Pendaftar();

        //sha
        if((int) $row['sha'] == 0) {
            $sha = $this->nilai->where('getKriteria.kode', 'sha')->where('nama_awal', 0)->first()->id;
        } elseif((int) $row['sha'] >= 4750000) {
                $sho = $this->nilai->where('getKriteria.kode', 'sha')->where('nama_awal', 4750000)->first()->id;
        } else {
            $sha = $this->nilai->where('getKriteria.kode', 'sha')->where('nama_awal', '<', (int) $row['sha'])->where('nama_akhir', '>=', (int) $row['sha'])->first()->id;
        }

        //shi
        if((int) $row['shi'] == 0) {
            $shi = $this->nilai->where('getKriteria.kode', 'shi')->where('nama_awal', 0)->first()->id;
        } elseif((int) $row['shi'] >= 4750000) {
                $sho = $this->nilai->where('getKriteria.kode', 'shi')->where('nama_awal', 4750000)->first()->id;
        } else {
            $shi = $this->nilai->where('getKriteria.kode', 'shi')->where('nama_awal', '<', (int) $row['shi'])->where('nama_akhir', '>=', (int) $row['shi'])->first()->id;
        }

        //sho
        if((int) $row['sho'] == 0) {
            $sho = $this->nilai->where('getKriteria.kode', 'sho')->where('nama_awal', 0)->first()->id;
        }
        elseif((int) $row['sho'] >= 4750000) {
            $sho = $this->nilai->where('getKriteria.kode', 'sho')->where('nama_awal', 4750000)->first()->id;
        } else {
            $sho = $this->nilai->where('getKriteria.kode', 'sho')->where('nama_awal', '<', (int) $row['sho'])->where('nama_akhir', '>=', (int) $row['sho'])->first()->id;
        }

        //skj
        if((int) $row['skj'] == 0) {
            $skj = $this->nilai->where('getKriteria.kode', 'skj')->where('nama_awal', 0)->first()->id;
        }
        elseif((int) $row['skj'] > 1500000) {
            $skj = $this->nilai->where('getKriteria.kode', 'skj')->where('nama_awal', 1500000)->first()->id;
        } else {
            $skj = $this->nilai->where('getKriteria.kode', 'skj')->where('nama_awal', '<', (int) $row['skj'])->where('nama_akhir', '>=', (int) $row['skj'])->first()->id;
        }

        return $pendaftar->updateOrCreate([
            'beasiswas_id' => $this->beasiswas_id,
            'nama' => strtolower($row['nama']),
            ],[
                'sta' => $this->nilai->where('getKriteria.kode', 'sta')->where('nama_awal', strtolower($row['sta']))->first()->id,
                'sti' => $this->nilai->where('getKriteria.kode', 'sti')->where('nama_awal', strtolower($row['sti']))->first()->id,
                'spa' => $this->nilai->where('getKriteria.kode', 'spa')->where('nama_awal', strtolower($row['spa']))->first()->id,
                'spi' => $this->nilai->where('getKriteria.kode', 'spi')->where('nama_awal', strtolower($row['spi']))->first()->id,
                'ska' => $this->nilai->where('getKriteria.kode', 'ska')->where('nama_awal', strtolower($row['ska']))->first()->id,
                'ski' => $this->nilai->where('getKriteria.kode', 'ski')->where('nama_awal', strtolower($row['ski']))->first()->id,
                'sha' => $sha,
                'shi' => $shi,
                'sho' => $sho,
                'skr' => $this->nilai->where('getKriteria.kode', 'skr')->where('nama_awal', strtolower($row['skr']))->first()->id,
                'sjt' => $this->nilai->where('getKriteria.kode', 'sjt')->where('nama_awal', strtolower($row['sjt']))->first()->id,
                'skj' => $skj,
            ]
        );
    }
}
