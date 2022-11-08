<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="ml-180">
                        {{-- @foreach($productos as $producto)
                            <tr>
                            <td class="control" tabindex="0"></td>
                            <td>{{$producto->titulo}}</td>
                            <td>{{$producto->categoria->nombre}}</td>
                            <td></td>
                            </tr>
                        @endforeach --}}
                        <select name="myselect" id="myselect">
                            <option value="0">Camisetas</option>
                            <option value="1">Gorros</option>

                            <option value="2" selected='selected'>Pantalones</option>
                        </select>
                        {{-- {{$producto->categoria->nombre}} --}}</div>
                    <x-plantilla>

                                <div class="bg-white">
                                    <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                                        <h2 class="sr-only">Products</h2>

                                        <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                                            @foreach ($productos as $producto)
                                                    <a href="#" class="group">
                                                      <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 xl:aspect-h-8">
                                                        <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
                                                      </div>
                                                      <h3 class="mt-4 text-sm text-gray-700">{{ $producto->titulo }}</h3>
                                                      <p class="mt-1 text-lg font-medium text-gray-900">{{ $producto->precio }}&euro;</p>
                                                      <div class="text-sm text-gray-900 ">
                                                        <form action="{{ route('anadiralcarrito', $producto) }}" method="POST">
                                                            @csrf
                                                            @method('POST')
                                                            <button type="submit" class="px-4 py-1 text-sm text-white bg-red-400 rounded">Añadir al carrito</button>
                                                        </form>

                                                    </div>

                                                    </a>
                                                    @endforeach







                                                  </div>
                                                </div>
                                              </div>






                    </x-plantilla>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
