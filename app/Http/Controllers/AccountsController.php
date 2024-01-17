<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Accounts;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
class AccountsController extends Controller
{
    public function index(){
        if (auth()->user()->account_type !== 'Super-Admin') {
            return redirect('home');
        }
        $accounts = Accounts::all();
        return view('admin.accounts', ['accounts' => $accounts]);
    }
    public function store(Request $request){
        $message = 'Successfully Added';
        $validated = $request->validate([
            "username" => ['required', 'min:5', Rule::unique('accounts', 'username')],
            "email" => ['required', 'email', Rule::unique('accounts', 'email')],
            "password" => 'required | min:6',
            "account_type" => 'required|in:Super-Admin,Catalog-Manager,Dashboard-Viewer',
        ]);
        $validated['password'] = bcrypt($validated['password']);
        $validated['created_at'] = Carbon::now();
        $validated['updated_at'] = Carbon::now();
        Accounts::create($validated);
        return redirect('/accounts')->with('message', $message);
    }
    public function edit($id){
        $account = Accounts::where('id', $id)->firstOrFail();
        return view('admin.edit_admin', ['account' => $account]);
    }
    public function update(Request $request, $id){
        $account = Accounts::where('id', $id)->firstOrFail();
        $validated = $request->validate([
            "username" => 'required',
            "email" => ['required', 'email'],
            "password" => 'required',
            "account_type" => 'required|in:Super-Admin,Catalog-Manager,Dashboard-Viewer',
        ]);
        $validated['updated_at'] = Carbon::now();
        $account->update($validated);
        return redirect('/accounts')->with('message', 'Updated Successfully');
    }
    public function destroy($id){
        $data = Accounts::find($id);
        $username = $data->username;
        $data->delete();
        return redirect('/accounts')->with('message', 'Successfully Deleted ' . $username . "'s Account!");
    }
    public function process(Request $request){
        $validated = $request->validate([
            "email" => ['required', 'email'],
            "password" => 'required'
        ]);
        
        if(auth('web')->attempt($validated)){
            $request->session()->regenerate();
            return redirect('/home')->with(['message' => 'Welcome back!']);
        }
        return back()->withErrors(['email' => 'Login Failed'])
                     ->onlyInput('email');
    }
    public function logout(Request $request){
        $message = 'Logout Successful!';
        $request->session()->regenerate();
        $request->session()->invalidate();
        return redirect('/login')->with('message', $message);
    }
}
