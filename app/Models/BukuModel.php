<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    use HasFactory;
    protected $table        = "tbl_buku";
    protected $primaryKey   = "idbuku";
    protected $fillable     = ['idbuku','kodebuku','judul','pengarang','penerbit'];
}
