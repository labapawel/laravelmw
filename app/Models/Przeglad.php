<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Przeglad extends Model
{
    use HasFactory;
    protected $fillable = [
        'rejestracja_id',
        'dataprzegladu',
        'datanastprzegladu',
        'uwagi'
    ];

    public function rejestracja()
    {
        return $this->belongsTo(Rejestracja::class,'rejestracja_id');
    }
}
