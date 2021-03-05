<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SetoranIn extends Model
{
    use HasFactory;
    use SoftDeletes;

    Protected $fillable     = ['nama_penyetor','jumlah_setoran','tanggal','create_by','update_by','delete_by'];
    protected $primaryKey   = 'id_setoran';
}
