<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodicals;
use Carbon\Carbon;
class PeriodicalsController extends Controller
{
    public function index(){
        if (auth()->user()->account_type == 'Dashboard-Viewer') {
            return redirect('home');
        }
        $periodicals = Periodicals::all();
        return view('admin.periodicals', ['periodicals' => $periodicals]);
    }
    public function store(Request $request){
        $message = 'Successfully Added';
        $validated = $request->validate([
            "accession_number" => ['required'],
            "title" => ['required'],
            "volume_number" => ['required', $max = 11],
            "issue_number" => ['required', $max = 3],
            "period_covered" => ['required'],
            "availability_status" => 'required|in:Available,Borrowed,On-hold',
        ]);
        $validated['created_at'] = Carbon::now();
        $validated['updated_at'] = Carbon::now();
        Periodicals::create($validated);
        return redirect('/periodicals')->with('message', $message);
    }
    public function edit($id){
        $periodicals = Periodicals::where('accession_number', $id)->firstOrFail();
        return view('admin.edit_periodicals', ['periodicals' => $periodicals]);
    }
    public function update(Request $request, $id){
        $periodicals = Periodicals::where('accession_number', $id)->firstOrFail();
        $validated = $request->validate([
            "accession_number" => ['required'],
            "title" => ['required'],
            "volume_number" => ['required'],
            "issue_number" => ['required'],
            "period_covered" => ['required'],
            "availability_status" => 'required|in:Available,Borrowed,On-hold',
        ]);
        $validated['updated_at'] = Carbon::now();
        $periodicals->update($validated);
        return redirect('/periodicals')->with('message', 'Updated Successfully');
    }
    public function destroy($id){
        $data = Periodicals::find($id);
        $data->delete();
        return redirect('/periodicals')->with('message', 'Deleted Successfully');
    }
}

