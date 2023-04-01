<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPelajaran extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $fillable = ["id", "kelas_id", "mapel_id", "no_identitas", "jam", "lama_jam", "hari"];

    function kelas()
    {
        return $this->belongsTo(KelasMaster::class, 'kelas_id', 'id');
    }

    function mapel()
    {
        return $this->belongsTo(MataPelajaranMaster::class, 'mapel_id', 'id');
    }

    function pengajar()
    {
        return $this->belongsTo(Santripengajar::class, 'no_identitas', 'no_identitas');
    }
}
