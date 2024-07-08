<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\layanan;

class WebsiteController extends Controller
{
    public function index(){
        $layanans = layanan::all();
        return view('pageweb.index', compact('layanans'));
    }
    public function about(){
        return view('pageweb.about');
    }
}
