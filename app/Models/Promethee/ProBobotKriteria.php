<?php

namespace App\Models\Promethee;

use App\Models\RefKriteria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProBobotKriteria extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getKriteria()
    {
        return $this->belongsTo(RefKriteria::class, 'ref_kriterias_id', 'id');
    }
}
