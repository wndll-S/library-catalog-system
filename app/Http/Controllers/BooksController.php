<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Books;
use App\Models\Genre;

class BooksController extends Controller
{
    public function index(){
        if (auth()->user()->account_type == 'Dashboard-Viewer') {
            return redirect('home');
        }
        $books = Books::all();
        $genre = Genre::all();
        return view('admin.books', ['books' => $books, 'genre' => $genre]);
    }
    public function store(Request $request){
        $message = 'Successfully Added';
        $validated = $request->validate([
            "title" => ['required'],
            "author" => 'required',
            "year_published" => 'required',
            "call_number" => ['required'],
            "genre_id" => ['required'],
            "availability_status" => 'required|in:Available,Borrowed,On-hold',
        ]);
        $validated['created_at'] = Carbon::now();
        $validated['updated_at'] = Carbon::now();
        Books::create($validated);
        return redirect('/books')->with('message', $message);
    }
    public function edit($id){
        $book = Books::where('id', $id)->firstOrFail();
        $genre = Genre::all();
        return view('admin.edit_book', ['book' => $book, 'genre' => $genre]);
    }
    public function update(Request $request, $id){
        $book = Books::where('id', $id)->firstOrFail();
        $validated = $request->validate([
            "author" => ['required'],
            "title" => ['required'],
            "year_published" => ['required'],
            "call_number" => ['required'],
            "genre_id" => ['required'],
            "availability_status" => 'required|in:Available,Borrowed,On-hold',
        ]);
        $validated['updated_at'] = Carbon::now();
        $book->update($validated);
        return redirect('/books')->with('message', 'Updated Successfully');
    }
    public function destroy($id){
        $data = Books::find($id);
        $title = $data->title;
        $data->delete();
        return redirect('/books')->with('message', 'Successfully Deleted ' . $title);
    }
}
