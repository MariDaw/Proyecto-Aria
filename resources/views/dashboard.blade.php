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
                    See more!
                    <div class="flex ">
                        <img class="border-1 m-2 w-auto h-auto" src="img/home2.jpg"  alt="Home Explorer">
                        <img class="border-1 m-2 w-auto h-auto" src="img/home3.jpg"  alt="Home Explorer">
                        <img class="border-1 m-2 w-auto h-auto" src="img/home4.jpg"  alt="Home Explorer">
                        <img class="border-1 m-2 w-auto h-auto" src="img/home1.jpg"  alt="Home Explorer">
                    </div>
                    <div class="border-b-2 border-black mt-7 ">
                        <h3 class="text-xl text-black ">OUR BRANDS!</h3>
                    </div>
                    <div class="flex ">
                        <img class="border-1 m-2" src="img/hym.jpg" width="150px" height="150px" alt="Brands">
                        <img class="border-1 m-2" src="img/zara.jpg" width="150px" height="150px" alt="Brands">
                        <img class="border-1 m-2" src="img/pyb.jpg" width="150px" height="150px" alt="Brands">
                        <img class="border-1 m-2" src="img/urban.jpg" width="150px" height="150px" alt="Brands">
                    </div>
                </div>
            </div>
        </div>

    </div>



</x-app-layout>
