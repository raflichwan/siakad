<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ["no_identitas", "tanggal", "keterangan", "jenis"];

    function santripengajars()
    {
        return $this->belongsTo(Santripengajar::class, 'no_identitas', 'no_identitas');
    }
}
