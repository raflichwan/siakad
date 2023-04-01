<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ["nis", "nama", "alamat", "jenis_kelamin", "tanggal_lahir", "kelas", "no_hp"];
}
