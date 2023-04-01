<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $fillable = ["nik", "nama", "alamat", "jenis_kelamin", "tanggal_lahir", "no_hp"];
}
