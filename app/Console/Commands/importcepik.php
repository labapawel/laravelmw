<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class importcepik extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'importcepik';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'import danych z cepiku';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $this->info("Pobieram dane z pliku import.csv");
        $dane = \Storage::disk('public')->get('import.csv');
        $linie = explode("\n", $dane);
        $dane = [];
        /**
            0 => "Numer kolejny rejestru"
            1 => "Data przeprowadzonego badania /Data korekty"
            2 => "Marka pojazdu"
            3 => "Typ, model handlowy"
            4 => "Numer rejestracyjny pojazdu"
            5 => "Seria i numer dowodu rejestracyjnego"
            6 => "Numer identyfikacyjny pojazdu lub nadwozia /podwozia/ramy"
            7 => " Op.Ew."
            8 => " Paliwo"
            9 => "Rodzaj pojazdu"
            10 => "Rodzaj badania, czynno�ci"
            11 => "Data pierw. rejestr. w kraju /za granic�"
            12 => "Termin nastepnego badania techn."
            13 => "Wynik badania"
            14 => "Imi�, nazwisko, nr uprawn. diagnosty /Korygowa�:"
            15 => "Stwierdzone usterki (Dodatkowe informacje)"
            16 => "Informacje o dokonanej korekcie "
            17 => "TAK/NIE"
            18 => "Warunki i ograniczenia"
            19 => "Uwagi (Stwierdzone usterki)"
            20 => "Przebieg"
            21 => "Kraj"
            22 => "Kategoria"
            23 => "Uwagi rejestru"
            24 => "Dodatkowe informacje"
         */
        
        foreach($linie as $i => $linia)
        {
            if($i!=0)
            {
            $dane=explode("\t", $linia);
            if(count($dane)> 10) {   
                $marka = trim($dane[2]);
                $model = trim($dane[3]);
                $rej = trim($dane[4]);
                $rodzaj = trim($dane[9]);
                $paliwo = trim($dane[8]);
                $war = trim($dane[18]);
                $rejKrajZag = trim($dane[11]);
                $rPaliwo = "-- Brak --";
                $dataPR = '';

               // dd($rejKrajZag);
                if(preg_match_all('/([0-9X]{4}-[0-9X]{2}-[0-9X]{2})( \/ )([0-9X]{4}-[0-9X]{2}-[0-9X]{2})/', $rejKrajZag, $res))
                {
                    if($res[3][0]!="XXXX-XX-XX")
                        $dataPR = $res[3][0];
                    else     
                    $dataPR = $res[1][0];
//dd($dataPR, $rejKrajZag);
                }
                     


                if($paliwo=="P")
                {
                    $rPaliwo = "Benzyna ";
                    if(strpos('przystosowanego do zasilania gazem', $war)>0)
                    {
                        $rPaliwo .= "+ GAZ";
                    }
                } elseif($paliwo=="R") $rPaliwo = "DIESEL"; 
                


               
                $mMarka = \App\Models\Marka::firstOrCreate(['marka'=>$marka]);
                // $mMarka->save();

                $mRodzaj = \App\Models\RodzPojazdow::firstOrCreate(['rodzaj'=>$rodzaj]);
                // $mRodzaj->save();

                $mModel =  \App\Models\Modele::firstOrCreate(['model'=>$model, 'marka_id'=>$mMarka->getKey(), 'rodzaj_id'=>$mRodzaj->getKey()]);


                $mRodzpaliwa = \App\Models\Rodzpaliwa::firstOrCreate(['rodzaj'=>$rPaliwo]);
                $mRodzpaliwa->active = 1;
                $mRodzpaliwa->save();




                //problem z datą
                //$mRej = \App\Models\Rejestracja::firstOrCreate(['rej'=>$rej,'perwszarej'=>$dataPR]);



             }
            }
        }

        // dd($dane[0]);
    }
}
