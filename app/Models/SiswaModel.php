<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaModel extends Model
{
    use HasFactory;
    protected $table        = "tbl_siswa";
    protected $primaryKey   = "idsiswa";
    protected $fillable     = ['idsiswa','nis','namasiswa','kelas','hp'];
}

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class SiswaModel extends Model
// {
//     use HasFactory;
// }
