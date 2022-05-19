<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetugasModel extends Model
{
    use HasFactory;
    protected $table        = "tbl_petugas";
    protected $primaryKey   = "idpetugas";
    protected $fillable     = ['idpetugas','namapetugas','hp'];
}

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class PetugasModel extends Model
// {
//     use HasFactory;
// }
