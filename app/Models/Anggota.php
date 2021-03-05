<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anggota extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['nama_anggota','email','no_hp','alamat','create_by','delete_by','update_by'];
    protected $primaryKey = 'id_anggota';
}
