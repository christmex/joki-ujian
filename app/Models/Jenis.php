<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    protected $connection   = "mysql";
    protected $table        = "jenis";
    protected $primaryKey   = "jenis_id";
    protected $timestamp    = true;
    public $incrementing    = true;

    protected $fillable = [
        'jenis_nama',
    ];
    
    public function Obat()
    {
        return $this->hasMany(Obat::class,"jenis_id","jenis_id");
    }
}
