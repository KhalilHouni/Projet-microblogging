<x-guest-layout>

    <h1 class="text-center p-6" style="color: #b41f0b; font-weight: bold; font-size: 30px">Se créer un compte</h1>
    
    <div class="flex justify-center">
    
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
    
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
    
            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <!-- Biographie -->
            <div>
                <x-input-label for="biography" :value="__('Biography')" />
                <x-text-input id="biography" class="block mt-1 w-full" type="text" name="biography" :value="old('biography')" required autofocus autocomplete="biography" />
                <x-input-error :messages="$errors->get('biography')" class="mt-2" />
            </div>
    
            <!-- Photo de profil -->
            <div>
                <x-input-label for="photo" :value="__('Photo')" />
                <x-text-input id="photo" class="block mt-1 w-full" type="file" name="photo" :value="old('photo')" />
                <x-input-error :messages="$errors->get('photo')" class="mt-2" />
            </div>
    
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
    
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
    
            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
    
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
    
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
    
            <!-- Bouton -->
            <div class="flex items-center justify-center mt-4">
                <input
                type="submit" name="valider" value="S'enregistrer" 
                class="shadow py-2 px-4 rounded"
                style="background-color: #1ba251; color: white"
                >
            </div>
            
            <div class="flex items-center justify-center mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>
    
        </form>
    
    </div>
    
    </x-guest-layout>
    