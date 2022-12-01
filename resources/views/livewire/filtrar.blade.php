<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 flex bg-white border-b border-gray-200">
                <x-plantilla>
 <div class="bg-white">
        <select name="famosoSelect" id="famosoSelect" wire:model="famosoSelect">
            <option value="All" selected>All</option>
            @foreach ($famosos as $famoso)
           <option value="{{$famoso->nombre}}" >{{$famoso->nombre}}</option>

           @endforeach

       </select>
       <form action="{{url('/search')}}" method="POST" role="search">
        {{csrf_field()}}
        <div class="input-group">
          <input type="text" class="form-control" name="q" placeholder="Search for"><span class="input-group-btn">
           <button type="submit" class="btn btn-info">
       <i class="fas fa-search fa-sm"></i> Search
      </button>
          </span>

        </div>
      </form>

       <div class="mx-auto  max-w-2xl py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Customers also purchased</h2>

            <div
                class="mt-6 grid grid-cols-3 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

    @foreach ($publicaciones as $publicacion)
                                            <div class="group relative">
                                                <div
                                                    class="min-h-80 aspect-w-1 aspect-h-1 w-full overflow-hidden  hover:scale-110 rounded-md bg-gray-200  lg:aspect-none lg:h-80">
                                                    <a href="{{route('show/publicacion', [$publicacion])}}">
                                                    <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg"
                                                        alt="Front of men&#039;s Basic Tee in black."
                                                        class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                                                    </a>
                                                    </div>

                                                <div class="mt-4 flex justify-between">
                                                    <div>
                                                        <h3 class="text-sm text-gray-700">
                                                            <a href="#">
                                                                {{ $publicacion->famoso->nombre }}
                                                            </a>
                                                        </h3>



                                                        <div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                    @endforeach
                                </x-plantilla>
                            </div>
                            </div>
                            </div>
                            </div>

                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    @livewireScripts
