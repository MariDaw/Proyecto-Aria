<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-plantilla>
                        <div class="flex w-full ">
                            <h1 class="items-start text-3xl text-gray-500">
                                Perfil
                            </h1>


                            <h2 class=" justify-end ml-80 text-3xl text-black ">{{ $perfil->user_id }}</h2>

                        </div>
                    </x-plantilla>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
