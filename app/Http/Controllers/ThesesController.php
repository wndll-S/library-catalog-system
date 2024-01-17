<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Theses;
use Illuminate\Http\Request;
use Carbon\Carbon;
class ThesesController extends Controller
{
    public function index(){
        if (auth()->user()->account_type == 'Dashboard-Viewer') {
            return redirect('home');
        }
        $theses = Theses::all();
        $subject = Subject::all();
        return view('admin.theses', ['theses' => $theses, 'subject' => $subject]);
    }
    public function store(Request $request){
        $message = 'Successfully Added';
        $validated = $request->validate([
            "author" => ['required'],
            "title" => ['required'],
            "publication_year" => ['required'],
            "subject_id" => ['required'],
            "availability_status" => 'required|in:Available,Borrowed,On-hold',
        ]);
        $validated['created_at'] = Carbon::now();
        $validated['updated_at'] = Carbon::now();
        Theses::create($validated);
        return redirect('/theses')->with('message', $message);
    }
    public function edit($id){
        $subject = Subject::all();
        $theses = Theses::where('call_number', $id)->firstOrFail();
        return view('admin.edit_theses', ['theses' => $theses, 'subjects' => $subject]);
    }
    public function update(Request $request, $id){
        $theses = Theses::where('call_number', $id)->firstOrFail();
        $validated = $request->validate([
            "author" => ['required'],
            "title" => ['required'],
            "publication_year" => ['required'],
            "subject_id" => ['required'],
            "availability_status" => 'required|in:Available,Borrowed,On-hold',
        ]);
        $validated['updated_at'] = Carbon::now();
        $theses->update($validated);
        return redirect('/theses')->with('message', 'Updated Successfully');
    }
    public function destroy($id){
        $data = Theses::find($id);
        $data->delete();
        return redirect('/theses')->with('message', 'Deleted Successfully');
    }
}
