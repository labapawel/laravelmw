<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wiadomosc;
use App\Models\Osoba;

class WiadomoscController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dane = Wiadomosc::where('status','dowyslania')
                        ->where('datawyslania', '<=', date("Y-m-d"))
                        ->where('datawyslania', '>=', date("Y-m-d", strtotime("-4 days")))
                        ->get();

        return response()->json($dane);
    }


    public function dane($id)
    {
        // $wiadomosc = Wiadomosc::find($id);
        // $wiadomosc->osoba;

        $wiadomosc = Osoba::find($id);
        $wiadomosc->wiadomosci;

        //dd($wiadomosc);
        return response()->json($wiadomosc);
    }
    public function wyslane($id)
    {

        $dane['status']='nok';
        $dane['id']=$id;

        $wiadomosc = Wiadomosc::find($id);
        if($wiadomosc && $wiadomosc->status != 'wyslane')
            {
                $wiadomosc->status = 'wyslane';
                $wiadomosc->datawyslane = date("Y-m-d");
                $wiadomosc->save();
                $dane['status']='ok';
            }

        return response()->json($dane);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
