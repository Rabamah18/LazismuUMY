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

    protected $casts = [
        'tanggal' => 'datetime',
    ];

    /**
     * Get the pemenimaManfaat that owns the Penyaluran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function ashnaf()
    {
        return $this->belongsTo(Ashnaf::class);
    }

    public function pilar()
    {
        return $this->belongsTo(Pilar::class);
    }

    public function programPilar()
    {
        return $this->belongsTo(ProgramPilar::class);
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    public function tahun()
    {
        return $this->belongsTo(Tahun::class);
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }
}
