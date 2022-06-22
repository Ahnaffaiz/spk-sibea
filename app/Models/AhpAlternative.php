<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AhpAlternative extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getPendaftar()
    {
        return $this->belongsTo(Pendaftar::class,  'pendaftars_id', 'id');
    }
}
