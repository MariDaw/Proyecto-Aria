<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Carrito') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-plantilla>
                        <table class="table-auto">
                            <thead>
                                <th class="px-6 py-2 text-gray-500">
                                    Producto
                                </th>
                                <th class="px-6 py-2 text-gray-500">
                                    Cantidad
                                </th>
                                <th class="px-6 py-2 text-gray-500">
                                    Precio
                                </th>
                            </thead>
                            <tbody>
                                @php
                                    $precio = 0;
                                @endphp
                                @foreach ($carritos as $carrito)
                                    <tr>
                                        <td class="px-6 py-2">{{ $carrito->producto->descripcion }}</td>
                                        <td class="px-6 py-2">{{ $carrito->cantidad }}</td>
                                        <td class="px-6 py-2">{{ $carrito->producto->precio * $carrito->cantidad}}&euro;</td>
                                        <td>
                                            <div class="text-sm text-gray-900 ">
                                                <form action="{{ route('restar', $carrito) }}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit" class="px-4 py-1 text-sm text-white bg-red-400 rounded">-</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="text-sm text-gray-900 ">
                                                <form action="{{ route('sumar', $carrito) }}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit" class="px-4 py-1 text-sm text-white bg-red-400 rounded">+</button>
                                                </form>
                                            </div>
                                            @php
                                                $precio += $carrito->producto->precio * $carrito->cantidad;
                                            @endphp
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- Precio total -->
                        <p class="text-right">Total a pagar: <span id="total">{{$precio}}</span>&euro;</p>
                        <div class="mt-5">
                            <form action="{{route('vaciar')}}" method="post">
                                @csrf
                                @method('POST')
                                <button class="bg-red-300 border-solid-3 text-black px-7 py-2" type="submit"> Vaciar carrito</button>
                            </form>
                        </div>
                        <div class="mt-5">
                            <form action="{{route('pedido')}}" method="post">
                                @csrf
                                @method('POST')
                                <button class="bg-green-300 text-black px-7 py-2" type="submit"> Realizar pedido</button>
                            </form>
                        </div>
                    </x-plantilla>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
