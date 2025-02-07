<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);


        // Try to authenticate the User first
        // $user = User::where('email', $request->email)->first();

        // // Check if the user exists and the password is correct
        // if ($user && Hash::check($request->password, $user->password)) {
        //     Auth::login($user);
        //     return redirect()->route('/'); // Redirect after successful login
        // }

        // If no user found, try authenticating the Team
        $team = Team::where('email', $request->email)->first();

        // Check if the team exists and the password matches
        if ($team && Hash::check($request->password, $team->password)) {
            // If the password is correct, log the team in
            Auth::login(user: $team);  // Depending on your setup, you may need to handle team-specific login
            // dd($team);
            return view('welcome'); // Redirect after successful login
        }

        // If no user or team matched, return a validation error
        throw ValidationException::withMessages([
            'email' => ['These credentials do not match our records.'],
        ]);
    }
}