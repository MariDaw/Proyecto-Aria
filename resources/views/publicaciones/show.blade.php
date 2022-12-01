<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Publicaciones') }}
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
                                                        <a href="{{route('show/publicacion', [$publicacion])}}">

                                                        <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg"
                                                            alt="Front of men&#039;s Basic Tee in black."
                                                            class="h-96 w-96 object-cover object-center lg:h-full lg:w-full">
                                                        </a>

                                                        </div>

                                                    <div class="mt-4 flex justify-between">
                                                        <div>
                                                            <h3 class="text-sm text-gray-700">
                                                                <a href="#">

                                                                    {{ $publicacion->famoso->nombre }}
                                                                </a>
                                                            </h3>

                                                              <form class="w-auto mt-10" action="{{ route('anadircomentario') }}"
                                                                  method="POST">
                                                                  @csrf
                                                                  @method('POST')
                                                                  <div class="w-auto md:w-full px-3 mb-2 mt-2">
                                                                      <input  id="comentario" name="comentario"
                                                                          maxlength="100"
                                                                          class="bg-white border-b-2 border-gray-500 leading-normal resize-none w-full h-10 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
                                                                          placeholder='Comment...' required>
                                                                  </div>
                                                                  <input type="text" id="publicacion" name="publicacion"
                                                                      hidden value="{{ $publicacion->id }}">
                                                                  <div class="-mr-1 w-20">
                                                                      <input type='submit'
                                                                          class="bg-red-400 w-20 h-6 text-center justify-center items-center text-red-900 font-s  border border-red-500 rounded-lg tracking-wide mr-1 hover:bg-red-500"
                                                                          value='Post'>
                                                                  </div>

                                                              </form>

                                                              <div>
                                                                  @foreach ($publicacion->comentarios as $comentario)
                                                                      @php
                                                                          $fecha = explode(' ', $comentario->created_at);
                                                                      @endphp
                                                                      @if ($comentario->comentario_id != null)
                                                                      @else
                                                                          <div class="space-y-2 w-full">

                                                                              <div class="flex">
                                                                                  <div class="flex-shrink-0 mr-3">

                                                                                  </div>

                                                                                  <div
                                                                                      class="flex-1 border rounded-lg px-2 py-2 sm:px-4 sm:py-4 leading-relaxed ">

                                                                                      <strong>{{ $comentario->user->name }}</strong>
                                                                                      <span
                                                                                          class="text-xs text-gray-400">{{ $fecha[0] }}</span>
                                                                                      <div class="flex">
                                                                                          <p class="text-sm w-3/4 inline-block">
                                                                                              {{ $comentario->texto }}
                                                                                          </p>
                                                                                      </div>

                                                                                  </div>
                                                                              </div>
                                                                          </div>
                                                                      @endif
                                                                  @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                    </x-plantilla>
                                </div>
                                </div>
                                </div>
                                </div>

</x-app-layout>
