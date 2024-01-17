<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Borrow;
use App\Models\Genre;
use App\Models\Periodicals;
use App\Models\Theses;

class DashboardController extends Controller
{
    public function index(){
        if (auth()->user()->account_type == 'Catalog-Manager') {
            return redirect('home');
        }
        $books = Books::all();
        $periodicals = Periodicals::all();
        $theses = Theses::all();
        $genre = Genre::all();
        $borrow = Borrow::all();
        $latestBooks = Books::latest()->first();
        $latestPeriodicals = Periodicals::latest()->first();
        $latestTheses = Theses::latest()->first();
        $latestGenre = Genre::latest()->first();
        return view('admin.dashboard', ['books' => $books, 
                'periodicals' => $periodicals, 
                'theses' => $theses, 
                'genre' => $genre,
                'borrow' => $borrow,
                'latestBooks' => $latestBooks,
                'latestPeriodicals' => $latestPeriodicals,
                'latestGenre' => $latestGenre,
                'latestTheses' => $latestTheses,]);
    }
}
