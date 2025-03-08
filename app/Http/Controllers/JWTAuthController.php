<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Mail;



class JWTAuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'role' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'phone_number' => $request->get('phone_number'),
            'address' => $request->get('address'),
        ]);
        Auth::login($user);

        return redirect()->route('home');
    }
    //-------------
    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {
        return redirect()->route('home');
    }

    return back()->withErrors(['login' => 'Incorrect email or password'])->withInput();
}

public function sendResetCode(Request $request)
{
    $request->validate(['email' => 'required|email|exists:users,email']);

    $user = User::where('email', $request->email)->first();

    $code = Str::random(6);
    PasswordReset::updateOrCreate(
        ['email' => $user->email],
        ['token' => $code, 'created_at' => now()]
    );

    try {
        Mail::to($user->email)->send(new \App\Mail\PasswordResetMail($code));
        session(['reset_email' => $user->email]); 
        return redirect()->route('resetpassword')->with('success', 'A reset code has been sent to your email');
    } catch (\Exception $e) {
        return back()->with('error', 'There was a problem sending the email. Please try again');
    }
}

public function resetPassword(Request $request)
{
    $email = session('reset_email'); 

    if (!$email) {
        return redirect()->route('password.request')->with('error', 'Session has expired. Please resubmit your request for reset');
    }

    $request->validate([
        'code' => 'required|string',
        'password' => 'required|string|min:6|confirmed',
    ]);

    $passwordReset = PasswordReset::where('email', $email)
                                  ->where('token', $request->code)
                                  ->first();

    if (!$passwordReset) {
        return back()->with('error', 'The code you entered is incorrect or expired');
    }

    $user = User::where('email', $email)->first();
    $user->password = Hash::make($request->password);
    $user->save();

    session()->forget('reset_email'); 
    $passwordReset->delete();

    return redirect()->route('login')->with('success', 'Password reset successful! You can now log in');
}





    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
