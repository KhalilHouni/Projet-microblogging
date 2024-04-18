<x-guest-layout>

	<!-- Voir les posts en mode "stories" -->
	<div class="flex mt-6">
	@foreach ($allPosts as $post)
		<a href="{{ route('posts.show', $post) }}" alt="Lire le post" class="px-4">
			<div style="border-radius: 50%; background-color: #f9dadb;
						height: 80px; width: 80px; border: solid 1px #ed4832;
						background-image: url('{{ url('storage/'.$post->img_url) }}');
						background-position: center;
						background-size: cover;">
			</div>
		</a>
		@endforeach
	</div>

	<!-- On parcourt la collection de Post -->
	@foreach ($posts as $post)

	<div class="flex flex-col shadow-md" style="max-width: 600px; margin: 30px; border: 1px solid #e8e1de">

		<!-- PHOTO + DESCRIPTION -->
		<div class="flex flex-col">

			<div class="flex p-2 justify-between">
				<a href="{{ route('users.show', $post->user->id) }}" alt="Voir le profil" class="flex items-center">
					<div style="border-radius: 50%;
								height: 30px; width: 30px;
								border: solid 1px #ed4832;
								background-image: url('{{ url('storage/'.$post->user->photo) }}');
								background-position: center;
								background-size: cover;">
					</div>
					<p class="px-2" style="font-style: italic; font-size: 15px">{{ $post->user->name }}</p>
				</a>

			</div>

			<div class="flex flex-col">
				<a href="{{ route('posts.show', $post) }}" alt="Lire le post" >
					<img src="{{ asset('storage/' . $post->img_url) }}" alt="Photo de la publication">

					<p class="p-6 text-center">{{ $post->description }}</p>
				</a>
			</div>

		</div>

	</div>
	@endforeach

	<!-- Previous / Next -->
	<div style="margin : 10px 0 50px 0">
		{{ $posts->links() }}  
	</div>


</x-guest-layout>
