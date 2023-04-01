<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelanggaranMaster extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $fillable = ["id", "keterangan", "poin", "jenis_pelanggaran"];
}
