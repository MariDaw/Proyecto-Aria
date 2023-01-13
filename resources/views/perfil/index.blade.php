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
    <div class="p-16">
        <div class="p-8 bg-white shadow mt-24">
          <div class="grid grid-cols-1 ">

            <div class="relative">
              <div class="w-48 h-48 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-48 flex items-center justify-center text-indigo-500">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
        </svg>
              </div>
            </div>
          </div>

          <div class="mt-7 text-center border-b pb-12">
            <h1 class="text-4xl font-medium text-gray-700">{{Auth::user()->name}}</h1>
            <p class="font-light text-gray-600 mt-3">{{Auth::user()->email}}</p>
          </div>

          <div class="mt-12 flex flex-col justify-center">
            <p class="text-gray-600 text-center font-light lg:px-16">An artist of considerable range, Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. An artist of considerable range.</p>
            <button
          class="text-indigo-500 py-2 px-4  font-medium mt-4"
        >
          Show more
        </button>
          </div>

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

                                    <form action="{{ route('unsave', $save) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="px-4 py-1 text-sm text-white bg-red-400 rounded">Unsave</button>
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

                                        <form action="{{ route('unproduct', $savePro) }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="px-4 py-1 text-sm text-white bg-red-400 rounded">Unproduct</button>
                                        </form>

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
    </div>
    @include('components.footer')
</x-app-layout>
