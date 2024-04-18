<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

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
     * Update the user's profile information.

  


     * Update the user's profile information.
    */
    public function update(ProfileUpdateRequest $request, User $user): RedirectResponse
    {
        // Validation des données du formulaire
        $request->validate([
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255'],
            'biography' => ['nullable', 'string'],
            'photo' => ['nullable', 'image'], // Image est facultative
        ]);
    
        // Si une nouvelle image est téléchargée
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            // Stockez le fichier dans le dossier de stockage avec son nom original
            $photoName = $photo->getClientOriginalName();
            $photo->storeAs('public/users', $photoName);
            // Mettez à jour le chemin dans la base de données avec le nom original du fichier
            $user->update(['photo' => $photoName]);
        }
    
        // Mise à jour des autres informations utilisateur
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "biography" => $request->biography,
            "photo" => $request ->photo,
            'updated_at' => now()
        ]);
    
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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

        return Redirect::to('/posts');
    }
}
