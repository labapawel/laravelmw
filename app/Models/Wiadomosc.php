<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wiadomosc extends Model
{
    use HasFactory;
    protected $fillable = [
        'osoba_id',
        'datawyslania',
        'tresc',
        'status',
        'datawyslane'
    ];

    public function osoba(){
        return $this->belongsTo(Osoba::class,'osoba_id');
    }
}
