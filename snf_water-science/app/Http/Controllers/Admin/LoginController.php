<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Logdata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request) 
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            $logdata = new Logdata;
            $logdata->email = $request->email;
            $logdata->ip_address = $request->ip();
            $logdata->save();

            return redirect()->route('admin.dashboard'); 
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    public function index()
    {
        $log = Logdata::orderBy('created_at', 'desc')->get();
        return view('admin.log.index', 
        compact('log')
    );

    }

    public function delete($id)
    {
        Logdata::where('id', $id)->delete();
        return redirect()->route('admin.log.index')->with('success', 'Deleted successfully.');
    }

}
