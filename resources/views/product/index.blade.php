@extends('layouts.app')

@section('title', 'TechStore - Productos')

@section('content')
<main class="flex-grow w-full max-w-[1440px] mx-auto px-4 lg:px-10 py-6 lg:py-10">

    {{-- Categorías --}}
    <section class="mb-10">
        <div class="flex gap-3 overflow-x-auto pb-4 scrollbar-hide">
            <a href="{{ route('produc.index') }}"
               class="flex h-10 shrink-0 items-center justify-center gap-2 rounded-full
                      {{ !request('search') && !request('category')
                          ? 'bg-slate-900 dark:bg-white text-white dark:text-slate-900 shadow-md'
                          : 'bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 hover:border-primary' }}
                      px-6 font-medium text-sm transition-all">
                Todas
            </a>
        </div>
    </section>

    {{-- Header + botón agregar --}}
    <section class="mb-6">
        <div class="flex flex-col sm:flex-row justify-between items-start
                    sm:items-center gap-4">
            <div>
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white">
                    Productos
                </h2>
                @if(isset($search) && $search)
                <p class="text-sm text-slate-500 dark:text-[#9d9fb9] mt-1">
                    Resultados para:
                    <span class="font-medium text-slate-900 dark:text-white">
                        "{{ $search }}"
                    </span>
                    — {{ $milista->total() }} encontrado(s)
                    <a href="{{ route('produc.index') }}"
                       class="ml-2 text-primary hover:underline">
                        Limpiar
                    </a>
                </p>
                @endif
            </div>
            <a href="{{ route('product.create') }}"
               class="flex items-center gap-2 bg-primary hover:bg-blue-600
                      text-white px-5 py-2.5 rounded-lg text-sm font-medium
                      transition-colors shadow-lg shadow-primary/20">
                <span class="material-symbols-outlined text-[20px]">add_circle</span>
                Agregar producto
            </a>
        </div>
    </section>

    {{-- Grid de productos --}}
    <section class="mb-16">
        @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 dark:bg-green-500/10 border
                    border-green-200 dark:border-green-500/30 rounded-lg
                    text-green-800 dark:text-green-400 text-sm">
            {{ session('success') }}
        </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($milista as $product)
            @php $isFav = in_array($product->id, $favoriteIds); @endphp

            <div class="group flex flex-col bg-white dark:bg-[#1c1c27] rounded-xl
                        overflow-hidden border border-slate-200 dark:border-[#282a39]
                        hover:border-primary transition-all hover:shadow-xl">

                {{-- Imagen --}}
                <a href="{{ route('product.show', $product) }}"
                   class="relative w-full aspect-[4/3] bg-slate-50
                          dark:bg-[#111218] p-4 flex items-center justify-center">
                    @if($product->image && $product->image !== 'no hay ruta')
                    <img alt="{{ $product->name }}"
                         class="w-full h-full object-contain transition-transform
                                group-hover:scale-105"
                         src="{{ asset('storage/' . $product->image) }}"/>
                    @else
                    <span class="material-symbols-outlined text-5xl
                                 text-slate-300 dark:text-[#3b3d54]">
                        image
                    </span>
                    @endif
                </a>

                {{-- Info --}}
                <div class="p-4 flex flex-col gap-2 flex-1">
                    <div class="flex justify-between items-start gap-2">
                        <a href="{{ route('product.show', $product) }}"
                           class="hover:text-primary transition-colors flex-1">
                            <h3 class="text-sm font-medium text-slate-900
                                       dark:text-white line-clamp-1">
                                {{ $product->name }}
                            </h3>
                        </a>
                        <p class="text-primary font-bold text-sm shrink-0">
                            ${{ number_format($product->price, 2) }}
                        </p>
                    </div>
                    <p class="text-slate-500 dark:text-[#9d9fb9] text-xs line-clamp-2">
                        {{ $product->description }}
                    </p>

                    {{-- Acciones --}}
                    <div class="mt-auto pt-3 flex gap-2">

                        {{-- Agregar al carrito --}}
                        <form action="{{ route('cart.add', $product->id) }}"
                              method="POST" class="flex-1">
                            @csrf
                            <button type="submit"
                                    class="w-full h-10 rounded-lg bg-slate-100
                                           dark:bg-[#282a39] text-slate-900
                                           dark:text-white font-medium text-sm
                                           hover:bg-primary hover:text-white
                                           transition-colors flex items-center
                                           justify-center gap-2">
                                <span class="material-symbols-outlined text-[18px]">
                                    add_shopping_cart
                                </span>
                                Agregar
                            </button>
                        </form>

                        {{-- Editar --}}
                        <a href="{{ route('product.edit', $product) }}"
                           class="h-10 px-3 rounded-lg bg-slate-100
                                  dark:bg-[#282a39] text-slate-500
                                  dark:text-[#9d9fb9] hover:bg-primary
                                  hover:text-white transition-colors flex
                                  items-center justify-center"
                           title="Editar">
                            <span class="material-symbols-outlined text-[18px]">
                                edit
                            </span>
                        </a>

                        {{-- Favorito --}}
                        <form action="{{ route('favorites.toggle', $product->id) }}"
                              method="POST">
                            @csrf
                            <button type="submit"
                                    class="h-10 px-3 rounded-lg transition-colors
                                           flex items-center justify-center
                                           {{ $isFav
                                               ? 'bg-red-500/10 text-red-500 hover:bg-red-500 hover:text-white'
                                               : 'bg-slate-100 dark:bg-[#282a39] text-slate-400 hover:text-red-500' }}"
                                    title="{{ $isFav ? 'Quitar favorito' : 'Agregar a favoritos' }}">
                                <span class="material-symbols-outlined text-[20px]"
                                      style="font-variation-settings: 'FILL' {{ $isFav ? 1 : 0 }}">
                                    favorite
                                </span>
                            </button>
                        </form>

                        {{-- Eliminar --}}
                        <form action="{{ route('product.destroy', $product) }}"
                              method="POST"
                              onsubmit="return confirm('¿Eliminar este producto?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="h-10 px-3 rounded-lg bg-red-50
                                           dark:bg-red-500/10 text-red-500
                                           hover:bg-red-500 hover:text-white
                                           transition-colors flex items-center
                                           justify-center"
                                    title="Eliminar">
                                <span class="material-symbols-outlined text-[18px]">
                                    delete
                                </span>
                            </button>
                        </form>

                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-4 text-center py-20">
                <span class="material-symbols-outlined text-6xl
                             text-slate-300 dark:text-[#3b3d54]">
                    inventory_2
                </span>
                <p class="mt-4 text-slate-500 dark:text-[#9d9fb9] text-lg">
                    No se encontraron productos.
                </p>
                <a href="{{ route('produc.index') }}"
                   class="mt-4 inline-flex text-primary hover:underline text-sm">
                    Ver todos los productos
                </a>
            </div>
            @endforelse
        </div>

        {{-- Paginación --}}
        <div class="mt-10">
            {{ $milista->links() }}
        </div>
    </section>

</main>
@endsection