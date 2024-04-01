<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramPilar extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function pilar()
    {
        return $this->belongsTo(Pilar::class);
    }
}
