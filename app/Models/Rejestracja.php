<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rejestracja extends Model
{
    use HasFactory;
    public $table = 'vrejestracjas';
    protected $fillable = [
        'osoba_id',
        'rej',
        'model_id',
        'perwszarej',
        'rodzpaliwa_id',
        'uwagi',
        'active',
    ];

}
