<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're here!
                </div>
            </div>
        </div>
        {{-- <div>
            @foreach ($famosos as $famoso)
            <p> Famoso: {{$famoso->nombre}}</p>
            @endforeach
        </div> --}}
    </div>



</x-app-layout>
