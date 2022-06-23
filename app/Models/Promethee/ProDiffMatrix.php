<?php

namespace App\Models\Promethee;

use App\Models\Pendaftar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProDiffMatrix extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getFirstAlternative()
    {
        return $this->belongsTo(ProAlternative::class, 'first_alternatives_id', 'id');
    }

    public function getSecondAlternative()
    {
            return $this->belongsTo(ProAlternative::class, 'second_alternatives_id', 'id');
    }
}
