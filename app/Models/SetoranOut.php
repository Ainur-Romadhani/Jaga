<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SetoranOut extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable     = ['penerima','dana_keluar','keperluan','dokumentasi','create_by','update_by','delete_by'];
    protected $primaryKey   = 'id_setoran_out';
}
