<?php

namespace App\Models\Promethee;

use App\Models\Pendaftar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProAlternative extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getDecisionMatrices() 
    {
        return $this->hasOne(ProDecisionMatrix::class, 'pro_alternatives_id', 'id');
    }

    public function getPendaftar()
    {
        return $this->belongsTo(Pendaftar::class,  'pendaftars_id', 'id');
    }
}
