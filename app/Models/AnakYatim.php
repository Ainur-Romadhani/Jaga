<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnakYatim extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [ 'nama_anak',
                            'nama_ibu',
                            'nama_bapak',
                            'alamat',
                            'no_hp_orang_tua',
                            'create_by',
                            'delete_by',
                            'update_by',
];
    protected $primaryKey = 'id_anak';
}
