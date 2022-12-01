<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Publicaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-plantilla>

                            <tbody>

                                <div class="bg-white">
                                    <select name="postCategory" id="postCategory">
                                        <option value="0">Gigi Hadid</option>
                                        <option value="1">Bella Hadid</option>

                                        <option value="2" selected='selected'>Kendall Jenner</option>
                                    </select>
                                    <div class="mx-auto max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
                                        <h2 class="text-2xl font-bold tracking-tight text-gray-900">Customers also purchased</h2>

                                        <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                                            @foreach ($publicaciones as $publicacion)
                                            <div class="group relative">
                                              <div class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden rounded-md bg-gray-200  lg:aspect-none lg:h-80">
                                                <a href="{{route('show', [$publicacion])}}">
                                                <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                              </div>
                                              <div class="mt-4 flex justify-between">
                                                <div>
                                                  <h3 class="text-sm text-gray-700">
                                                    <a href="#">
                                                      <span aria-hidden="true" class="absolute inset-0"></span>
                                                      {{ $publicacion->famoso->nombre}}
                                                    </a>
                                                  </h3>
                                                  <p class="mt-1 text-sm text-gray-500">{{ $publicacion->descripcion }}</p>
                                                </div>
                                                <p class="text-sm font-medium text-gray-900">like</p>
                                              </div>
                                              <span class="inline-flex items-center text-sm">
                                                  <button wire:click="like" class="inline-flex space-x-2 {{-- {{ $post->isLiked() ? 'text-green-400 hover:text-green-500' : 'text-gray-400 hover:text-gray-500' }} --}} focus:outline-none focus:ring-0">
                                                    <svg class="h-5 w-5" x-description="solid/thumb-up" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                                                    </svg>

                                                    <span class="font-medium text-gray-900">{{-- {{ $count }} --}}</span>
                                                    <span class="sr-only">likes</span>
                                                  </button>
                                                </span>
                                            </div>

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
