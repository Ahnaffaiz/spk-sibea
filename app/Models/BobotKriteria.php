<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BobotKriteria extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getKriteria()
    {
        return $this->belongsTo(RefKriteria::class, 'ref_kriterias_id', 'id');
    }
}