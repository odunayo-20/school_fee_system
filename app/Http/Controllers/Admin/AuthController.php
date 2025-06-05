<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Mail\WebsiteMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    // public function login()
    public function login()
    {
        return view('admin.auth.login');
    }
    public function signup()
    {
        return view('admin.auth.signup');
    }

    public function signupConfirm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:admins,email',
            'password' => 'required|min:5',
        ]);

       $admin = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
        return redirect(route('admin.login'));
    }


    public function loginConfirm(Request $request)
    {
        // Validate input
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Add remember value (optional)
    $remember = $request->filled('remember');

    // Attempt to authenticate with the 'admin' guard
    if (Auth::guard('admin')->attempt($credentials, $remember)) {
        // Authentication passed...
        return redirect()->intended(route('admin.dashboard'));
    }

    // Authentication failed
    return back()->withErrors([
        'email' => 'Invalid credentials provided.',
    ])->withInput();
    }


    public function logout()
    {
        Auth::guard('admin')->logout();

        // Optionally clear session
        request()->session()->invalidate();
        request()->session()->regenerateToken();
            return redirect(route('admin.login'));
    }


    public function forget()
    {
        return view('admin.auth.forget');
    }


    public function forgetSend(Request $request)
    {
        $validated = $request->validate(['email' => 'required|email']);

        $admin = Admin::where('email', $request->email)->first();
        if (!$admin) {
            session()->flash('error', 'Email not found');
            return redirect(route('admin.forget'));
        }

        $token = Hash('sha256', time());
        $admin->token = $token;
        $admin->update();
        $reset_link = url('reset-password/' . $token . '/' . $request->email);
        $subject = "Reset Your Password";
        $message = 'Please Click On Below To Reset Your Password';
        $maildata = [
            'title' => 'Password Reset',
            'url' => $reset_link,
            'message' => $message,
        ];
        Mail::to($request->email)->send(new WebsiteMail($subject, $maildata));

        session()->flash('success', 'Reset Password Link sent to your email');
        return redirect(route('admin.forget'));
    }



    public function resetPassword(Request $request, $token, $email)
    {
        $admin = Admin::where('email', $email)->where('token', $token)->first();
        if (! $admin) {
            session()->flash('error', 'Invalid Email Or Token');

            return redirect(route('admin.login'));
        } else {
            $admin = Admin::where('email', $email)->where('token', $token)->first();
            return view('admin.auth.reset', compact('admin'));
            // return redirect(route('admin.resetPassword', compact('admin')));
        }
    }



    public function resetPasswordChange(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required|string',
            'password' => 'required|same:password',
        ]);

        $admin = Admin::where('email', $request->email)->where('token', $request->token)->first();
        $admin->password = Hash::make($request->password);
        $admin->token = ' ';
        $admin->update();
        session()->flash('success', 'Password Reset Successfully');

        return redirect(route('admin.login'));
    }
}
