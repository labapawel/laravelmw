<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Osoba extends Model
{
    use HasFactory;

    public function wiadomosci(){
        return $this->hasMany(Wiadomosc::class,'osoba_id');
    }

}
