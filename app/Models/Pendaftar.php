<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;
    protected $guarded = [];

        public function getsta()
        {
            return $this->belongsTo(RefNilaiKriteria::class, 'sta', 'id');
        }
        
        public function getsti()
        {
            return $this->belongsTo(RefNilaiKriteria::class, 'sti', 'id');
        }

        public function getspa()
        {
            return $this->belongsTo(RefNilaiKriteria::class, 'spa', 'id');
        }
        
        public function getspi()
        {
            return $this->belongsTo(RefNilaiKriteria::class, 'spi', 'id');
        }

        public function getska()
        {
            return $this->belongsTo(RefNilaiKriteria::class, 'ska', 'id');
        }
        
        public function getski()
        {
            return $this->belongsTo(RefNilaiKriteria::class, 'ski', 'id');
        }

        public function getsha()
        {
            return $this->belongsTo(RefNilaiKriteria::class, 'sha', 'id');
        }
        
        public function getshi()
        {
            return $this->belongsTo(RefNilaiKriteria::class, 'shi', 'id');
        }

        public function getsho()
        {
            return $this->belongsTo(RefNilaiKriteria::class, 'sho', 'id');
        }
        
        public function getskr()
        {
            return $this->belongsTo(RefNilaiKriteria::class, 'skr', 'id');
        }

        public function getsjt()
        {
            return $this->belongsTo(RefNilaiKriteria::class, 'sjt', 'id');
        }
        
        public function getskj()
        {
            return $this->belongsTo(RefNilaiKriteria::class, 'skj', 'id');
        }
}
