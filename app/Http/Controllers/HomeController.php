<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $pets = \App\Models\Pet::all();
        return view('home', ['pets' => $pets]);
    }
}
