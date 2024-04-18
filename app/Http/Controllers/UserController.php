<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //On récupère tous user id et posts
        $user = Auth::id();

        // On transmet user id et posts à la vue
        return view("users.show", compact("user"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id): View
    {
    
        
        // Récupérer l'ID de l'utilisateur à partir de l'URL
        $userId = $id;
    
        // Récupérer l'utilisateur à partir de l'ID
        $user = User::find($userId);
    
        // Vérifier si l'utilisateur existe
        if (!$user) {
            // Gérer le cas où l'utilisateur n'existe pas
            abort(404);
        }
    
        // Récupérer les posts de l'utilisateur
        $posts = Post::where('user_id', $userId)->get();
    
        return view('users.show', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
