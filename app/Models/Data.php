<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    public $incrementing=false;
    protected $primaryKey = 'id';
    protected $table = 'data';
    protected $fillable  = [
        "id",
        "nama",
        "tugas1",
        "uts",
        "tugas2",
        "kuis",
        "uas",
        "total",
    ];
}
