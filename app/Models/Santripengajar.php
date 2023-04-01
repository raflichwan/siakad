<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santripengajar extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $fillable = ["no_identitas", "nama", "alamat", "jenis_kelamin", "tanggal_lahir", "kelas", "no_hp", "type"];

    function kelas_masters()
    {
        return $this->belongsTo(KelasMaster::class, 'kelas', 'id');
    }
}
