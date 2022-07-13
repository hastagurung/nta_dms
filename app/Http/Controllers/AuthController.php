<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\UserLog;

class AuthController extends Controller
{
    private $_app = "";
    private $_page = null;
    private $_data = [];

    public function _construct()
    {

    }

    public function login()
    {
        return view('login');
    }

    public function loginAction(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $this->addToLog("login");
            return redirect()->route('document_folders.index');
        } else {
            return redirect()->back()->with('fail','Your username and password is incorrect .');
        }

        return redirect()->back()->withInput($request->only('username'))->withErrors(['username' => 'Credentials did not match our record']);
    }

    public function logout(Request $request)
    {
        $this->addToLog("logout");
        Auth::logout();
        $request->session()->invalidate();
		return redirect()->route('login');
    }

    public function addToLog($activity) {
        $log = new UserLog();
        $log->user_id = Auth::id();
        $log->activity = $activity;
        $log->description = ($activity == "login") ? "Logged in to the system" : "Logged out of the system";;
        $log->save();
    }
}
