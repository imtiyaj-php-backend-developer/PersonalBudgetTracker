<?php

namespace App\Http\Controllers;

use App\Models\Income_expense;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PersonaltrackerController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return view('login')->with('success', 'Register successfully');
    }


    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($credetials)) {
            return redirect('/home')->with('success', 'Login succesfully');
        }
        return back()->with('error', 'Invalid Email or Password!');
    }

    public function index()
    {
        $incomeExpenceDetails = Income_expense::all();
        $totalIncome = $incomeExpenceDetails->where('type', 'income')->sum('amount');
        $totalExpense = $incomeExpenceDetails->where('type', 'expense')->sum('amount');
        $totalAmount = $totalIncome - $totalExpense;
        return view('home', compact('incomeExpenceDetails','totalIncome','totalExpense','totalAmount'));
    }

    public function logout(Request $request)
    {
        // Auth::logout();
        // return view('login');
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return view('login')
            ->withSuccess('You have logged out successfully!');
    } 
    
    

    public function createUserForm(){
        return view('form');
    }
    public function UserForm(Request $request){
        // Form validation
        $request->validate([
            'description' => 'required',
            'amount' => 'required|integer|not_in:0',
            'date' => 'required',
            'type' => 'required',
        ]);
        //  Store data in database
        $user = new Income_expense();
        $user->description = $request->description;
        $user->amount = $request->amount;
        $user->date = $request->date;
        $user->type = $request->type;
        $user->save();
        $incomeExpenceDetails = Income_expense::all();
        $totalIncome = $incomeExpenceDetails->where('type', 'income')->sum('amount');
        $totalExpense = $incomeExpenceDetails->where('type', 'expense')->sum('amount');
        $totalAmount = $totalIncome - $totalExpense;
        return view('home', compact('incomeExpenceDetails','totalIncome','totalExpense','totalAmount'));
    }


    public function edit($id)
    {
        $incomeExpenceDetails = Income_expense::find($id);
        return view('edit', compact('incomeExpenceDetails'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'description' => 'required',
            'amount' => 'required|integer|not_in:0',
            'date' => 'required',
            'type' => 'required',
        ]);

        // Find the student record by ID
        $incomeExpenceDetails = Income_expense::findOrFail($id);

        // Update the student record with the new data
        $incomeExpenceDetails->update([
            'description' => $request->input('description'),
            'amount' => $request->input('amount'),
            'date' => $request->input('date'),
            'type' => $request->input('type'),
        
        ]);

        // Redirect back with a success message
        // return view('home',compact('incomeExpenceDetails'))->with('success', 'Student record updated successfully.');
        $incomeExpenceDetails = Income_expense::all();
        $totalIncome = $incomeExpenceDetails->where('type', 'income')->sum('amount');
        $totalExpense = $incomeExpenceDetails->where('type', 'expense')->sum('amount');
        $totalAmount = $totalIncome - $totalExpense;
        return view('home', compact('incomeExpenceDetails','totalIncome','totalExpense','totalAmount'));
        // return view('home', compact('incomeExpenceDetails'));
    }


    public function delete($id)
    {
        // Find the student record by ID
        $incomeExpenceDetails = Income_expense::findOrFail($id);

        // Delete the student record
        $incomeExpenceDetails->delete();

        // Redirect back with a success message
        // return view('home')->with('success', 'Student record deleted successfully.');
        $incomeExpenceDetails = Income_expense::all();
        $totalIncome = $incomeExpenceDetails->where('type', 'income')->sum('amount');
        $totalExpense = $incomeExpenceDetails->where('type', 'expense')->sum('amount');
        $totalAmount = $totalIncome - $totalExpense;
        return view('home', compact('incomeExpenceDetails','totalIncome','totalExpense','totalAmount'));
        // return view('home', compact('incomeExpenceDetails'));
    }


    public function dashboard()
{
    $incomeExpenceDetails = Income_expense::all();

    $totalIncome = $incomeExpenceDetails->where('type', 'income')->sum('amount');
    $totalExpense = $incomeExpenceDetails->where('type', 'expense')->sum('amount');
    $totalAmount = $totalIncome - $totalExpense;

    return view('home', compact('incomeExpenceDetails', 'totalIncome', 'totalExpense', 'totalAmount'));
}
    
}
