<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    use HasFactory;
    protected $fillable = [
        'model',
        'active',
        'rodzaj_id',
        'marka_id'
    ];

    public function marka(){
        return $this->belongsTo(Marka::class,'marka_id');
    }
    public function rodzaj(){
        return $this->belongsTo(RodzajPojazdow::class,'rodzaj_id');
    }

    public function getModelmarkaAttribute(){
        return "{$this->marka->marka} ({$this->model})";
    }
    
}
