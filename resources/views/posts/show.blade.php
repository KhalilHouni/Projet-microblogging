<x-guest-layout>

	<div class="flex flex-col shadow-md" style="max-width: 1000px; margin: 30px; border: 1px solid #e8e1de">

		<!-- picture + DESCRIPTION -->
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
				<div class="container">
					<h1>{{ $post->title }}</h1>
					<p>{{ $post->description }}</p>

					<!-- Affichage de l'image du post -->
					@if(isset($post->img_url))
						<div style="margin-bottom: 20px">
							<img src="{{ asset('storage/' . $post->img_url) }}" alt="Image du post">
						</div>
					@endif

				</div>
			</div>

		</div>

	</div>

</x-guest-layout>
