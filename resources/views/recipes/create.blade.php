<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crée une nouvlle recette') }}
        </h2>
    </x-slot>
         {{-- @php
            $recipe=App\Models\Recipe::latest()->first;
            dd($recipe->ingredients->pivot->amount);
            $recipe->ingredients->map(fn($ingredient)=>dump($ingredient->pivot->amount));

        @endphp  --}}
    <div class="mb-5">Créer votre nouvelle recette!</div>
    <form action="{{route('recipes.store')}}" method="POST">
        @csrf
        <x-label value="titre de la recette" for="title"></x-label>
        <x-input value="title" id="title"></x-input>
        @foreach ($ingredients as $ingredient)
            <div class="my-5" x-data="{isEnabled:false}">
            <x-label value="{{$ingredient->name}}" for="{{$ingredient->id}}"></x-label>
            
            <x-input type="checkbox" id="{{$ingredient->id}}" x-model="isEnabled"></x-input>
            <x-input name="ingredients[{{$ingredient->id}}][amount]" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                focus:outline-none focus:shadow-outline" x-bind:disabled="isEnabled"></x-input>
                
            <x-input name="ingredients[{{$ingredient->id}}][unit]" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                focus:outline-none focus:shadow-outline" x-bind:disabled="isEnabled"></x-input>
                @endforeach
                <x-button type="submit">créer ma recette</x-button>
                

            </div>
    </form>
</x-app-layout>
