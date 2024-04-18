<x-guest-layout>
    <h1 class="text-center p-6" style="color: #1255c0; font-weight: bold; font-size: 30px">Créer un post</h1>

    <div class="flex justify-center" style="margin-bottom: 50px">
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="user_id" value="{{ Auth::id() }}" >

            @if(isset($post->img_url))
            <div style="margin-bottom: 20px">
                <img src="{{ asset('/storage/' . $post->img_url) }}" alt="Image du post">

            </div>
        @endif
        

            <div class="py-2">
                <input type="file" name="img_url" id="img_url" >
                @error("img_url")
                <div>{{ $message }}</div>
                @enderror
            </div>

            <div class="py-2">
                <textarea name="description" id="description" lang="fr" rows="10" cols="70" placeholder="La description du post">{{ isset($post->description) ? $post->description : old('description') }}</textarea>
                @error("description")
                <div>{{ $message }}</div>
                @enderror
            </div>
    
            <input type="submit" name="valider" value="Valider" class="shadow py-2 px-4 rounded" style="background-color: #ed4832; color: white">
        </form>
    </div>
</x-guest-layout>
