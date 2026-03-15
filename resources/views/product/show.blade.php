@extends('layouts.app')

@section('title', $product->name . ' - TechStore')

@section('content')
<main class="flex-grow flex justify-center w-full px-4 md:px-10 lg:px-40
             py-8 lg:py-12">
    <div class="max-w-[1440px] w-full grid grid-cols-1 lg:grid-cols-2
                gap-12 xl:gap-24">

        {{-- Imagen --}}
        <div class="flex flex-col gap-6 w-full">

            {{-- Breadcrumb móvil --}}
            <div class="lg:hidden flex flex-wrap gap-2 text-sm">
                <a class="text-slate-500 dark:text-[#9d9fb9] hover:text-primary
                          transition-colors"
                   href="{{ url('/') }}">Inicio</a>
                <span class="text-slate-400 dark:text-[#9d9fb9]">/</span>
                <a class="text-slate-500 dark:text-[#9d9fb9] hover:text-primary
                          transition-colors"
                   href="{{ route('produc.index') }}">Productos</a>
                <span class="text-slate-400 dark:text-[#9d9fb9]">/</span>
                <span class="text-primary font-medium">{{ $product->name }}</span>
            </div>

            {{-- Imagen principal --}}
            <div class="group relative w-full aspect-[4/3] bg-white
                        dark:bg-[#1a1c2e] rounded-xl overflow-hidden border
                        border-slate-200 dark:border-[#282a39] shadow-2xl
                        flex items-center justify-center p-8">
                @if($product->image && $product->image !== 'no hay ruta')
                <img src="{{ asset('storage/' . $product->image) }}"
                     alt="{{ $product->name }}"
                     class="w-full h-full object-contain transition-transform
                            duration-700 group-hover:scale-105"/>
                @else
                <span class="material-symbols-outlined text-8xl
                             text-slate-300 dark:text-[#3b3d54]">
                    image
                </span>
                @endif
            </div>

        </div>

        {{-- Detalle --}}
        <div class="relative">
            <div class="lg:sticky lg:top-32 flex flex-col gap-8">

                {{-- Breadcrumb escritorio --}}
                <div class="hidden lg:flex flex-wrap gap-2 text-sm">
                    <a class="text-slate-500 dark:text-[#9d9fb9] hover:text-primary
                              transition-colors"
                       href="{{ url('/') }}">Inicio</a>
                    <span class="text-slate-300 dark:text-[#56586d]">/</span>
                    <a class="text-slate-500 dark:text-[#9d9fb9] hover:text-primary
                              transition-colors"
                       href="{{ route('produc.index') }}">Productos</a>
                    <span class="text-slate-300 dark:text-[#56586d]">/</span>
                    <span class="text-primary font-medium">{{ $product->name }}</span>
                </div>

                {{-- Nombre y precio --}}
                <div class="flex flex-col gap-2 border-b border-slate-200
                            dark:border-[#282a39] pb-6">
                    <h1 class="text-4xl md:text-5xl font-bold text-slate-900
                               dark:text-white tracking-tight">
                        {{ $product->name }}
                    </h1>
                    <p class="text-slate-600 dark:text-[#9d9fb9] text-base
                              leading-relaxed max-w-md">
                        {{ $product->description }}
                    </p>
                    <div class="mt-4 flex items-baseline gap-4">
                        <h2 class="text-3xl font-bold text-primary">
                            ${{ number_format($product->price, 2) }}
                        </h2>
                        <span class="px-2 py-0.5 rounded text-xs font-bold
                                     bg-green-500/10 text-green-600
                                     dark:text-green-400 border border-green-500/20">
                            {{ $product->status === 'active' ? 'En stock' : 'Agotado' }}
                        </span>
                    </div>
                </div>

                {{-- Categoría --}}
                <div class="flex items-center gap-2 text-sm text-slate-500
                            dark:text-[#9d9fb9]">
                    <span class="material-symbols-outlined text-[16px]">
                        category
                    </span>
                    Categoría:
                    <span class="text-slate-900 dark:text-white font-medium">
                        {{ optional($product->category)->name ?? 'Sin categoría' }}
                    </span>
                </div>

                {{-- Botones --}}
                <div class="flex flex-col gap-4">
                    <div class="flex gap-4 h-14">

                        {{-- Agregar al carrito --}}
                        <form action="{{ route('cart.add', $product->id) }}"
                              method="POST" class="flex-1">
                            @csrf
                            <button type="submit"
                                    class="w-full h-full bg-primary hover:bg-blue-600
                                           text-white font-bold rounded-lg shadow-lg
                                           hover:shadow-primary/50 transition-all flex
                                           items-center justify-center gap-2 text-lg">
                                Agregar al carrito
                                <span class="material-symbols-outlined text-[20px]">
                                    add_shopping_cart
                                </span>
                            </button>
                        </form>

                        {{-- Favorito --}}
                        <form action="{{ route('favorites.toggle', $product->id) }}"
                              method="POST">
                            @csrf
                            @php
                                $isFav = in_array(
                                    $product->id,
                                    session('favorites', [])
                                );
                            @endphp
                            <button type="submit"
                                    class="aspect-square h-full flex items-center
                                           justify-center rounded-lg border
                                           bg-white dark:bg-[#1a1c2e] transition-all
                                           {{ $isFav
                                               ? 'text-red-500 border-red-400 dark:border-red-500/50'
                                               : 'border-slate-200 dark:border-[#282a39] text-slate-400 hover:border-red-400 hover:text-red-500' }}"
                                    title="{{ $isFav ? 'Quitar de favoritos' : 'Agregar a favoritos' }}">
                                <span class="material-symbols-outlined text-[22px]"
                                      style="font-variation-settings: 'FILL' {{ $isFav ? 1 : 0 }}">
                                    favorite
                                </span>
                            </button>
                        </form>

                    </div>

                    <p class="text-xs text-slate-500 dark:text-[#9d9fb9] text-center
                              flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-[16px]
                                     text-green-500 dark:text-green-400">
                            verified_user
                        </span>
                        Garantía de 2 años · Envío gratuito
                    </p>
                </div>

                {{-- Volver --}}
                <a href="{{ route('produc.index') }}"
                   class="flex items-center gap-2 text-sm text-slate-500
                          dark:text-[#9d9fb9] hover:text-primary transition-colors
                          border-t border-slate-200 dark:border-[#282a39] pt-4">
                    <span class="material-symbols-outlined text-[16px]">
                        arrow_back
                    </span>
                    Volver a productos
                </a>

            </div>
        </div>
    </div>
</main>
@endsection