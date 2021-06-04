<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $connection   = "mysql";
    protected $table        = "supplier";
    protected $primaryKey   = "supplier_id";
    protected $timestamp    = true;
    public $incrementing    = true;

    protected $fillable = [
        'supplier_username',
        'supplier_nama',
        'supplier_password',
    ];
}
