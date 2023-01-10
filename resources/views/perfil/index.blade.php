<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-0">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-plantilla>
                        <div class="flex w-full ">
                            <img src="img/usuario.png" alt="usuario" class="mr-10">
                            <h1 class="items-start text-3xl text-black">
                                {{ $perfil->user_id }}
                            </h1>


                            <h2 class=" justify-end ml-80 text-3xl text-black "></h2>

                        </div>
                        <div class="flex w-full h-auto  mt-20">


                                <div class="mx-0 border border-blue-500 grid grid-cols-2 max-w-2xl py-5 px-0 sm:py-5 sm:px-0 lg:max-w-7xl lg:px-8">
                                    <div class="border m-0 border-green-600 ">
                                    <h2 class="text-2xl flex p-2 w-4/5 tracking-tight text-gray-600" style="font-family: 'Roboto Condensed', sans-serif; background-color: white;"><img class="mr-3" src="img/save.png" alt=""> PUBLICACIONES GUARDADAS
                                    </h2>

                                    <div
                                        class="mt-6 grid grid-cols-3 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                                        @foreach ($saves as $save)
                                            <div class="group relative">
                                                <div
                                                    class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden  hover:scale-110 rounded-md">
                                                    <a href="{{ route('show/publicacion', [$save->publicacion]) }}">
                                                        <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg"
                                                            alt="Front of men&#039;s Basic Tee in black."
                                                            class="h-32 w-28  object-center ">
                                                    </a>
                                                </div>

                                                <div class="mt-4 flex justify-between">
                                                    <div>
                                                        <h3 class="text-sm text-gray-700">
                                                            <a href="#">
                                                                {{ $save->publicacion->famoso->nombre }}
                                                            </a>
                                                        </h3>
                                                        <p class="mt-1 text-sm text-gray-500">
                                                            {{ $save->publicacion->descripcion }}</p>

                                                        {{-- <form action="{{ route('unsave', $publicacion) }}" method="POST">
                                                        @csrf
                                                        @method('POST')
                                                        <button type="submit" class="px-4 py-1 text-sm text-white bg-red-400 rounded">Unsave</button> --}}
                                                    </form>

                                                        <p class="text-red-400">
                                                            @if ($valoraciones->where('publicacion_id', $save->publicacion->id)->first() == null)
                                                                0 likes
                                                            @else
                                                                {{ $valoraciones->where('publicacion_id', $save->publicacion->id)->count() }}
                                                                likes
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                            @endforeach
                        </div>
                        </div>

                        <div class="border border-green-500 m-0">

                        <h2 class="text-2xl flex p-2 w-4/5 tracking-tight text-gray-600" style="font-family: 'Roboto Condensed', sans-serif; background-color: white;"><img class="mr-3" src="img/save.png" alt=""> PRODUCTOS GUARDADOS
                        </h2>

                        <div
                                        class="mt-6 grid grid-cols-3 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                                        @foreach ($savePros as $savePro)
                                            <div class="group relative">
                                                {{-- {{$savePro->user_id}} --}}
                                                <div
                                                    class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden  hover:scale-110 rounded-md bg-gray-200  lg:aspect-none lg:h-80">
                                                    <a href="{{ route('show/producto', [$savePro->producto]) }}">
                                                        <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg"
                                                            alt="Front of men&#039;s Basic Tee in black."
                                                            class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                                    </a>
                                                </div>

                                                <div class="mt-4 flex justify-between">
                                                    <div>
                                                        <h3 class="text-sm text-gray-700">
                                                            <a href="#">
                                                                {{ $savePro->producto->titulo }}
                                                            </a>
                                                        </h3>
                                                        <p class="mt-1 text-sm text-gray-500">
                                                            {{ $savePro->producto->descripcion }}</p>

                                                    </form>


                                                    </div>
                                                </div>
                                            </div>

                            @endforeach
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            </x-plantilla>
        </div>
    </div>
    </div>
    </div>
    @include('components.footer')
</x-app-layout>
