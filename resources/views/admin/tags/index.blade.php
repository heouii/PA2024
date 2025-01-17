<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des tags') }}
        </h2>

        <x-nav-link :href="route('tags.create')">
            {{ __('Créer un tag') }}
        </x-nav-link>
    </x-slot>
    <div class="flex justify-center">
            @forelse ($tags as $tag)
                <div class="mt-9">
                    <p>{{ $tag->name }}</p>
                    <p>{{ $tag->valorisation_coeff }}</p>
                    <a href="{{ route('tags.edit', $tag) }}" class="mr-2">
                    <x-primary-button>Editer</x-primary-button>
                    </a>

                    <form action="{{ route('tags.destroy', $tag) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-danger-button> Supprimer</x-danger-button>
                    </form>
                </div>
            @empty
                <p class="col-span-2">Il n'y a pas encore de tag </p>
            @endforelse
    </div>
</x-app-layout>