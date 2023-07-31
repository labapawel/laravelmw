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

    public function przeglad(){
        return $this->hasMany(przeglad::class,'rejestracja_id');
    }

    public function save($attr= [])
    {
        $this->table = 'rejestracjas';

        $dane = request()->all();
       //  dd($dane);
        $datanstprzeglądu =strtotime($dane['datenastprzeg']);
        //
        if($datanstprzeglądu && $datanstprzeglądu > time())
        {
           $rec = $this->przeglad()->firstOrCreate(['datanastprzegladu' => date('Y-m-d', $datanstprzeglądu)]);
           
           if(!$rec->dataprzegladu)
                $rec->dataprzegladu = date("Y-m-d");

           $rec->uwagi =  $dane['uwagiprzegladu'];
           $rec->save();
        } elseif($dane['dataprzegladu']) 
        {
            $rec = $this->przeglad()->firstOrCreate(['datanastprzegladu' => $dane['dataprzegladu']]);
            $rec->uwagi =  $dane['uwagiprzegladu'];
            $rec->save();
        }

        // dd($this->attributes);
        if(isset($this->attributes['uwagiprzegladu']))
            unset($this->attributes['uwagiprzegladu']);

        parent::save($attr);
    }
}
