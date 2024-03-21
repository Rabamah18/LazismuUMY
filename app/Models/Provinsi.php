<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];


    public function lokasis()
    {
        return $this->hasMany(Lokasi::class);
    }
}
