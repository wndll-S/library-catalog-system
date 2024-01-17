<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Periodicals;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Borrow;
use App\Models\Theses;

class BorrowController extends Controller
{
    public function index(){
        $borrow = Borrow::all();
        return view('admin.borrowed-materials', ['borrow' => $borrow]);
    }
    public function update(Request $request, $id, $category, $material_id){
        $message = 'Successfully returned a ' . $category;
        $borrow = Borrow::where('id', $id)->firstOrFail();
        $validated = $request->validate([
            'id' => 'required'
        ]);
        $validated['returned_at'] = Carbon::now();
        $borrow->update($validated);
        if($category == 'book'){
            $book = Books::where('id', $material_id)->firstOrFail();
            $availability_status['updated_at'] = Carbon::now();
            $availability_status['availability_status'] = 'Available';
            $book->update($availability_status);
            return redirect('/borrowed-materials')->with('message', $message);
        }
        else if($category == 'theses'){
            $theses = Theses::where('id', $material_id)->firstOrFail();
            $availability_status['updated_at'] = Carbon::now();
            $availability_status['availability_status'] = 'Available';
            $theses->update($availability_status);
            return redirect('/borrowed-materials')->with('message', $message);
        }
        else{
            $periodical = Periodicals::where('accession_number', $material_id)->firstOrFail();
            $availability_status['updated_at'] = Carbon::now();
            $availability_status['availability_status'] = 'Available';
            $periodical->update($availability_status);
            return redirect('/borrowed-materials')->with('message', $message);
        }
    }
    public function create($material, $id){
        
       
        if($material == 'book'){
            $book = Books::where('id', $id)->firstOrFail();
            $data = [
                'id' => $id,
                'title' => $book->title,
                'author' => $book->author,
                'call_number' => $book->call_number
            ];
        }
        else if($material == 'periodical'){
            $periodical = Periodicals::where('accession_number', $id)->firstOrFail();
            $data = [
                'id' => $id,
                'title' => $periodical->title,
                'volume_number' => $periodical->volume_number,
                'issue_number' => $periodical->issue_number
            ];
        }
        else{
            $theses = Theses::where('call_number', $id)->firstOrFail();
            $data = [
                'id' => $id,
                'title' => $theses->title,
                'author' => $theses->author,
                'call_number' => $theses->publication_year
            ];
        }
        return response()->json($data);
    }
    public function store(Request $request, $material){
         //dd($request->material_id);
        $message = 'Successfully Borrowed a ' . $material;
        $validated = $request->validate([
            'borrower_id_number' => 'required',
            'material_id' => 'required',
        ]);
        $availability_status = $request->validate([
            'availability_status' => 'required|in:Available,Borrowed,On-hold',
        ]);
        $validated['category'] = $material;
        $validated['borrowed_at'] = Carbon::now();
        Borrow::create($validated);
        
        if($material == 'book' ){
            $book = Books::where('id', $request->material_id)->firstOrFail();
            $availability_status['updated_at'] = Carbon::now();
            $book->update($availability_status);
            return redirect('/search/'.$material.'s')->with('message', $message);
        }
        else if($material == 'periodical'){
            $periodical = Periodicals::where('accession_number', $request->material_id)->firstOrFail();
            $availability_status['updated_at'] = Carbon::now();
            $periodical->update($availability_status);
            return redirect('/search/periodicals')->with('message', $message);
        }
        else{
            $theses = Theses::where('call_number', $request->material_id)->firstOrFail();
            $availability_status['updated_at'] = Carbon::now();
            $theses->update($availability_status);
            return redirect('/search/'.$material)->with(['message' => $message]);
        }
    }
}
