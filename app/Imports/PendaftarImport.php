<?php

namespace App\Imports;

use App\Models\Pendaftar;
use App\Models\RefNilaiKriteria;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PendaftarImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public $beasiswas_id, $is_update;

    public function __construct($id, $cond)
    {
        $this->beasiswas_id = $id;
        $this->is_update = $cond;
        $this->nilai = RefNilaiKriteria::with('getKriteria')->get();
    }
    public function model(array $row)
    {
        if($this->is_update) {
            $pendaftar = new Pendaftar();
            return $pendaftar->updateOrCreate([
                'beasiswas_id' => $this->beasiswas_id,
                'nama' => strtolower($row['nama']),
            ],[
                'sho' => $this->nilai->where('getKriteria.kode', 'sho')->where('nama_awal', '<=' ,strtolower($row['sho']))->where('nama_akhir', '>=' ,strtolower($row['sho']))->first()->id ?? null,
                'sta' => $this->nilai->where('getKriteria.kode', 'sta')->where('nama_awal', strtolower($row['sta']))->first()->id ?? null,
                'sti' => $this->nilai->where('getKriteria.kode', 'sti')->where('nama_awal', strtolower($row['sti']))->first()->id ?? null,
                'skr' => $this->nilai->where('getKriteria.kode', 'skr')->where('nama_awal', strtolower($row['skr']))->first()->id ?? null,
                'spa' => $this->nilai->where('getKriteria.kode', 'spa')->where('nama_awal', strtolower($row['spa']))->first()->id ?? null,
                'spi' => $this->nilai->where('getKriteria.kode', 'spi')->where('nama_awal', strtolower($row['spi']))->first()->id ?? null,
                'ska' => $this->nilai->where('getKriteria.kode', 'ska')->where('nama_awal', strtolower($row['ska']))->first()->id ?? null,
                'ski' => $this->nilai->where('getKriteria.kode', 'ski')->where('nama_awal', strtolower($row['ski']))->first()->id ?? null,
                'sha' => $this->nilai->where('getKriteria.kode', 'sha')->where('nama_awal', '<=' ,strtolower($row['sha']))->where('nama_akhir', '>=' ,strtolower($row['sha']))->first()->id ?? null,
                'shi' => $this->nilai->where('getKriteria.kode', 'shi')->where('nama_awal', '<=' ,strtolower($row['shi']))->where('nama_akhir', '>=' ,strtolower($row['shi']))->first()->id ?? null,
                'sjt' => $this->nilai->where('getKriteria.kode', 'sjt')->where('nama_awal', strtolower($row['sjt']))->first()->id ?? null,
                'skj' => $this->nilai->where('getKriteria.kode', 'skj')->where('nama_awal', strtolower($row['skj']))->first()->id ?? null,
            ]
            );
        }
        else {
            return new Pendaftar([
                'beasiswas_id' => $this->beasiswas_id,
                'nama' => $row['nama'],
                'sho' => $this->nilai->where('getKriteria.kode', 'sho')->where('nama_awal', '<=' ,strtolower($row['sho']))->where('nama_akhir', '>=' ,strtolower($row['sho']))->first()->id ?? null,
                'sta' => $this->nilai->where('getKriteria.kode', 'sta')->where('nama_awal', strtolower($row['sta']))->first()->id ?? null,
                'sti' => $this->nilai->where('getKriteria.kode', 'sti')->where('nama_awal', strtolower($row['sti']))->first()->id ?? null,
                'skr' => $this->nilai->where('getKriteria.kode', 'skr')->where('nama_awal', strtolower($row['skr']))->first()->id ?? null,
                'spa' => $this->nilai->where('getKriteria.kode', 'spa')->where('nama_awal', strtolower($row['spa']))->first()->id ?? null,
                'spi' => $this->nilai->where('getKriteria.kode', 'spi')->where('nama_awal', strtolower($row['spi']))->first()->id ?? null,
                'ska' => $this->nilai->where('getKriteria.kode', 'ska')->where('nama_awal', strtolower($row['ska']))->first()->id ?? null,
                'ski' => $this->nilai->where('getKriteria.kode', 'ski')->where('nama_awal', strtolower($row['ski']))->first()->id ?? null,
                'sha' => $this->nilai->where('getKriteria.kode', 'sha')->where('nama_awal', '<=' ,strtolower($row['sha']))->where('nama_akhir', '>=' ,strtolower($row['sha']))->first()->id ?? null,
                'shi' => $this->nilai->where('getKriteria.kode', 'shi')->where('nama_awal', '<=' ,strtolower($row['shi']))->where('nama_akhir', '>=' ,strtolower($row['shi']))->first()->id ?? null,
                'sjt' => $this->nilai->where('getKriteria.kode', 'sjt')->where('nama_awal', strtolower($row['sjt']))->first()->id ?? null,
                'skj' => $this->nilai->where('getKriteria.kode', 'skj')->where('nama_awal', strtolower($row['skj']))->first()->id ?? null,
            ]);
        }
    }
}
