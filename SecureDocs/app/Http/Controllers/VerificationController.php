<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerificationController extends Controller
{
    
    public function showVerificationForm()
    {
        return view('verify');
    }

    public function verify(Request $request)
    {
        $defaultPassword = 'default_password';

        if ($request->input('password') === $defaultPassword) {
            // Perform your verification logic here
            // For example, setting a session variable as verified
            $request->session()->put('isVerified', true);

            return redirect()->route('dashboard');
        }

        return back()->withErrors(['password' => 'The provided password is incorrect']);
    }
}

