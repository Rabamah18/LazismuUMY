<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahun extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function penghimpunans()
    {
        return $this->hasMany(Penghimpunan::class);
    }

    public function penyalurans()
    {
        return $this->hasMany(Penyaluran::class);
    }

    public function targetTahunans()
    {
        return $this->hasMany(TargetTahunan::class);
    }
}
