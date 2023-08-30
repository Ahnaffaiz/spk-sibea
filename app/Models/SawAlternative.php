<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SawAlternative extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getNormalizedMatrices() 
    {
        return $this->hasOne(SawNormalizedMatrix::class, 'saw_alternatives_id', 'id');
    }

    public function getPendaftar()
    {
        return $this->belongsTo(Pendaftar::class,  'pendaftars_id', 'id');
    }
}
