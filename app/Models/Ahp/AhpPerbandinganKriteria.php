<?php

namespace App\Models\Ahp;

use App\Models\RefKriteria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AhpPerbandinganKriteria extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getFirstKriteria()
    {
        return $this->belongsTo(RefKriteria::class, 'first_ref_kriterias_id', 'id');
    }

    public function getLastKriteria()
    {
        return $this->belongsTo(RefKriteria::class, 'last_ref_kriterias_id', 'id');
    }
}
