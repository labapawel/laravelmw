<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    use HasFactory;
    public $table="vmodeles";
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
    public function rejestracje(){
        return $this->hasMany(Rejestracja::class,'model_id');
    }

    public function getModelmarkaAttribute(){
        // dd($this->marka);
        return "{$this->marka->marka} ({$this->model})";
    }

    public function save($attr=[])
    {
        $this->tables = 'modeles';
        parent::save($attr);
    }
    
}
