<?php

namespace App\Models;

use App\Models\Ahp\AhpPerbandinganKriteria;
use App\Models\Promethee\ProBobotKriteria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getBobot()
    {
        return $this->hasMany(ProBobotKriteria::class, 'beasiswas_id', 'id');
    }

    public function getAhpBobot()
    {
        return $this->hasMany(AhpPerbandinganKriteria::class, 'beasiswas_id', 'id');
    }

    public function getPendaftar()
    {
        return $this->hasMany(Pendaftar::class, 'beasiswas_id', 'id');
    }
}
