<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex bg-white border-b border-gray-200">
                    <x-plantilla>
                        <div class="bg-white">

                            <div class="mx-auto  max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                                <div
                                    class="mt-6 grid grid-cols-3 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

                                    <div class="group relative">
                                        <div
                                            class=" aspect-w-1 aspect-h-1 w-[500px] h-[600px] overflow-hidden rounded-md bg-gray-200  ">
                                            <a href="{{ route('show', [$producto]) }}">

                                                <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg"
                                                    alt="Front of men&#039;s Basic Tee in black."
                                                    class="h-96 w-96 object-cover object-center lg:h-full lg:w-full">
                                            </a>

                                        </div>
                                        <h3 class="mt-4 text-sm text-gray-700">{{ $producto->titulo }}</h3>
                                        <p class="mt-1 text-lg font-medium text-gray-900">{{ $producto->precio }}&euro;
                                        </p>
                                        <div class="text-sm text-gray-900 ">
                                            <form action="{{ route('anadiralcarrito', $producto) }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                <button type="submit"
                                                    class="px-4 py-1 text-sm text-white bg-red-400 rounded">Añadir al
                                                    carrito</button>
                                            </form>

                                        </div>

                                        </a>


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
