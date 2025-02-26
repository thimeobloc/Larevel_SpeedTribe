<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Team;
use App\Models\Pilot;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Display the user's profile setup form.
     */
    public function setup(): View
    {
        $teams = Team::all();
        $pilots = Pilot::all();

        return view('profil_setup', [
            'teams' => $teams,
            'pilots' => $pilots,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Update the user's profile preferences.
     */
    public function updatePreferences(Request $request): RedirectResponse
    {
        $request->validate([
            'favorite_team' => 'nullable|exists:teams,id',
            'favorite_driver' => 'nullable|exists:pilots,id',
        ]);

        $user = Auth::user();
        $user->favorite_team = $request->input('favorite_team');
        $user->favorite_driver = $request->input('favorite_driver');
        $user->save();

        // Redirection vers le dashboard avec un message de confirmation
        return Redirect::route('dashboard')->with('status', 'Preferences updated successfully!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
