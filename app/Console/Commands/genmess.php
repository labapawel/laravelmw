<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class genmess extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'genmess';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generowanie wiadomości do klienta';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $dzien = Date('Y-m-d',strtotime("+7 days"));

        $this->info("Generuje wiadomości dla klienta na dzień {$dzien}");

        $rej = \App\Models\Przeglad::where('datanastprzegladu', $dzien)->get();
        foreach($rej as $item)
        {
           $daneklienta = $item->rejestracja; 
           if($daneklienta && $daneklienta->osoba_id != 1){
             if($daneklienta->active)
                if($daneklienta->telefon)
                {
                    $wiadomosc = \App\Models\Wiadomosc::firstOrCreate(
                        [
                        'osoba_id'=> $daneklienta->osoba_id,  
                        'przeglad_id'=>$item->getKey(),
                        'datawyslania'=> $dzien  
                        ]
                        );
                    $wiadomosc->tresc =  view('admin.genmess',
                        [
                                'dataprzegladu' => $dzien,
                                'rejestracja'   => $daneklienta->rej
                        ]
                    );
                    $wiadomosc->status = 'dowyslania';
                    $wiadomosc->save();
                } else $this->error("Brak telefonu klienta {$daneklienta->rej}");
           } else $this->error("Brak danych klienta w 'Przeglad::class' id {$item->getKey()}");
        }
     //  dd($rej[0]->rejestracja);


    }
}
