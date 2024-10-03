<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class homecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = DB::select('SELECT * FROM `categories` WHERE Status = "Active" LIMIT 3;
        ');
      return view('pages.home.welcome', compact('category'));
    }

    public function product(){
        return view('pages.home.showproducts');
    }

    public function about(){
        return view('pages.about.showAbout');
    }

    public function contact(){
        return view('pages.contact.showcontact');
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
