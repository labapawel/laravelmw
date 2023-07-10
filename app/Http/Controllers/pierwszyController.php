<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pierwszyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = date('Y-m-d');
        // []
        return view('pierwszy', ['now'=>$data])
            ->with('imie','Paweł')
            ->with('nazwisko','Ł.')
            ->with('html','<input type="text">')
            ;
    }

    public function metoda(){
        return 'metoda';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'create';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
