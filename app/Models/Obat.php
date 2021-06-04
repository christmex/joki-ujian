<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    
    protected $connection   = "mysql";
    protected $table        = "obat";
    protected $primaryKey   = "obat_id";

    protected $fillable = [
        'obat_id','obat_nama','obat_deskripsi','jenis_id','obat_dosis'
    ];
    
    public function Jenis()
    {
        return $this->belongsTo(Jenis::class,'jenis_id','jenis_id');
    }

    
}
