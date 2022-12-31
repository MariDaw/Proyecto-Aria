<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Publicaciones') }}
        </h2>
    </x-slot>

    <style>
        @charset "utf-8";
        #container {
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          width: 8%;
          height: 1vh;
          padding: 0px 0px;
          margin-bottom: 30px;
          margin-left: 0px;
          /* border: 1px solid red; */
        }
        .heart-like-button {
          position: relative;
          width: 30px;
          height: 30px;
        }
        .heart-like-button:before {
          position: absolute;
          top: 0;
          left: 15px;
          transform: rotate(-45deg);
          transform-origin: 0 100%;
          width: 17px;
          height: 27px;
          border-radius: 40px 40px 0 0;
        /*   background-color: #574136;
         */  content: "";
         background-color: #d65076;
          cursor: pointer;
          transition: background .4s;
        }
        .heart-like-button:after {
          position: absolute;
          top: 0;
          left: 0;
          transform: rotate(45deg);
          transform-origin :100% 100%;
          width: 17px;
          height: 27px;
          border-radius: 40px 40px 0 0;
        /*   background-color: #574136;
         */  content: "";
         background-color: #d65076;
          cursor: pointer;
          transition: background .4s;
        }
        h1 {
          margin: 0;
        /*   color: #574136; */
          color: #d65076;
          font-size: 3rem;
          letter-spacing: 1px;
          text-align: center;
        }
        .heart-like-button.liked::before,
        .heart-like-button.liked::after {
          background-color: #d65076;
        }
        .heart-like-button.liked {
          animation: liked .4s ease;
        }
        @keyframes liked {
          0% {
            transform: scale(.8);
          }
          50% {
            transform: scale(1.1);
          }
          100% {
            transform: scale(1);
          }
        }
        @media screen and (max-width: 480px) {
          #container {
            height: auto;
          }
          h1 {
            font-size: 2.5rem;
          }
        }
                </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex bg-white border-b border-gray-200">
                    <x-plantilla>
     <div class="bg-white">

           <div class="mx-auto  max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8 border border-blue-400">

                <div
                    class="mt-0 grid grid-cols-3 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

                    <div class="group relative mt-0">

                                                    <h2 class="text-3xl mt-0 text-gray-700">
                                                        <a href="#">

                                                            {{ $publicacion->famoso->nombre }}
                                                        </a>
                                                    </h2>
                                                    <div
                                                        class=" aspect-w-1 aspect-h-1 w-[400px] h-[500px] overflow-hidden rounded-md bg-gray-200  ">
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
                                                            <p class="mt-1 text-sm text-gray-500">
                                                                {{ $publicacion->descripcion }}</p>

                                                                <form action="{{ route('anadiralperfil', $publicacion) }}" method="POST">
                                                                    @csrf
                                                                    @method('POST')
                                                                    <button type="submit" class="px-4 py-1 text-sm text-white mb-5 bg-red-400 rounded">Save</button>

                                                                </form>


                                                                <p class="text-red-400">
                                                                    @if ($valoraciones->where('publicacion_id', $publicacion->id)->first() == null)
                                                                    0 likes
                                                                    @else
                                                                    {{$valoraciones->where('publicacion_id', $publicacion->id)->count()}}
                                                                    likes
                                                                    @endif
                                                                </p>

                                                                    @if (App\Http\Controllers\ValoracionController::isLiked($publicacion))
                                                                    <form action="{{ route('destroy', $publicacion) }}" method="POST">
                                                                      @csrf
                                                                      @method('POST')

                                                                      <button type="submit">
                                                                    <div id="container">
                                                                      <div class="heart-like-button">
                                                                      </div>
                                                                    </div>
                                                                  </button>
                                                                  </form>
                                                                      @else

                                                                      <form action="{{ route('store', $publicacion) }}" method="POST">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <button type="submit">
                                                                            <div id="container">
                                                                              <div class="heart-like-button">
                                                                              </div>
                                                                            </div>
                                                                          </button>
                                                                          </form>
                                                                          @endif


                                                              <form class="w-60 mt-10" action="{{ route('anadircomentario') }}"
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
                                                                          class="bg-red-400 w-20 mb-2 h-6 text-center justify-center items-center text-red-900 font-s  border border-red-500 rounded-lg tracking-wide mr-1 hover:bg-red-500"
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
                                <div class="flex grid-cols-2 w-full h-1/2">
                                    <div class="border border-red-500 w-auto h-1/2"><h1>PRENDAS</h1>
                                    <li>Camiseta</li>
                                    <li>Pantalon</li>
                                    <li>Zapatos</li>
                                    <li>Chaqueta</li>
                                </div>

                                </div>
                                </div>

                                <script defer>
                                    const button = document.querySelector(".heart-like-button");
                                    if (button.classList.contains("liked")) {
                                    button.classList.remove("liked");
                                  } else {
                                    button.classList.add("liked");
                                  }
                                button.addEventListener("click", () => {
                                  if (button.classList.contains("liked")) {
                                    button.classList.remove("liked");
                                  } else {
                                    button.classList.add("liked");
                                  }
                                });
                                </script>

</x-app-layout>
