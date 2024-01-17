<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademicDegree;
use App\Models\Books;
use App\Models\Genre;
use App\Models\Periodicals;
use App\Models\Subject;
use App\Models\Theses;
use App\Models\Borrow;

class ContentController extends Controller
{
    public function index(){
        $books = Books::orderBy('title')->get();
        $periodicals = Periodicals::orderBy('accession_number')->get();
        $theses = Theses::orderBy('call_number')->get();
        $borrow = Borrow::orderBy('id')->get();
        return view('search')->with(['books'=>$books, 'periodicals' => $periodicals, 'theses' => $theses, 'borrow' => $borrow]);
    }
    public function books(){
        $books = Books::orderBy('title')->get();
        $periodicals = Periodicals::orderBy('accession_number')->get();
        $theses = Theses::orderBy('call_number')->get();
        return view('books')->with(['books'=>$books, 'periodicals' => $periodicals, 'theses' => $theses, 'title' => 'Books']);
    }
    public function periodicals(){
        $books = Books::orderBy('title')->get();
        $periodicals = Periodicals::orderBy('accession_number')->get();
        $theses = Theses::orderBy('call_number')->get();
        return view('periodicals')->with(['books'=>$books, 'periodicals' => $periodicals, 'theses' => $theses, 'title' => 'Periodicals']);
    }
    public function theses(){
        $books = Books::orderBy('title')->get();
        $periodicals = Periodicals::orderBy('accession_number')->get();
        $theses = Theses::orderBy('call_number')->get();
        return view('theses')->with(['books'=>$books, 'periodicals' => $periodicals, 'theses' => $theses, 'title' => 'Theses']);
    }
}
