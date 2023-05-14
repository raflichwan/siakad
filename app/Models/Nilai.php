<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $fillable = ["id", "no_identitas", "mapel_id", "periode", "keterangan", "kitab", "tulis"];

    function santripengajars()
    {
        return $this->belongsTo(Santripengajar::class, 'no_identitas', 'no_identitas');
    }

    function mapel()
    {
        return $this->belongsTo(MataPelajaranMaster::class, 'mapel_id', 'id');
    }
}
