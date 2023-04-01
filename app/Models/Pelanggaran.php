<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $fillable = ["id", "pelanggaran_master_id", "no_identitas", "tanggal"];

    function pelanggaran_masters()
    {
        return $this->belongsTo(PelanggaranMaster::class, 'pelanggaran_master_id', 'id');
    }
    function santripengajars()
    {
        return $this->belongsTo(Santripengajar::class, 'no_identitas', 'no_identitas');
    }
}
