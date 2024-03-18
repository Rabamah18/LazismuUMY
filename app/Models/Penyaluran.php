<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyaluran extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    /**
     * Get the pemenimaManfaat that owns the Penyaluran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function penerimaManfaat()
    {
        return $this->belongsTo(PenerimaManfaat::class);
    }

    public function ashnaf()
    {
        return $this->belongsTo(Ashnaf::class);
    }

    public function pilar()
    {
        return $this->belongsTo(Pilar::class);
    }

    public function tahun()
    {
        return $this->belongsTo(Tahun::class);
    }
}
