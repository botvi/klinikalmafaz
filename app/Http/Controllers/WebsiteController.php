<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\layanan;
use App\Models\Berita;

class WebsiteController extends Controller
{
    public function index(){
        $layanans = layanan::all();
        return view('pageweb.index', compact('layanans'));
    }
    public function about(){
        return view('pageweb.about');
    }
    public function berita()
    {
        $beritas = Berita::all();
        return view('pageweb.berita', compact('beritas'));
    }

    public function showberita($id)
    {
        // Get the requested news article by ID
        $berita = Berita::findOrFail($id);
    
        // Get recent news articles (excluding the current one)
        $beritas = Berita::where('id', '!=', $id) // Exclude the current article
                        ->orderBy('created_at', 'desc') // Order by most recent
                        ->take(5) // Limit to 5 recent articles
                        ->get();
    
        return view('pageweb.showberita', compact('berita', 'beritas'));
    }
    
}
