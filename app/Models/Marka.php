<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marka extends Model
{
    use HasFactory;
    protected $fillable = [
        'marka',
    ];
    
    public function model(){
        return $this->hasMany(Modele::class,'marka_id');
    }
}
