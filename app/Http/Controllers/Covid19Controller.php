<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Covid19;

class Covid19Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //$sql = "select * from covid19s";    
        //$covid19s = DB::select($sql, []);
 
        //$covid19s = DB::table("covid19s")->get();

        $covid19s = Covid19::get();


        return view('covid19/index', compact('covid19s'));
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
