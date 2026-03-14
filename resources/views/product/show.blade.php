@extends('layouts.app')

@section('title', $product->name . ' - TechStore')

@section('content')
<main class="flex-grow flex justify-center w-full px-4 md:px-10 lg:px-40 py-8 lg:py-12">
    <div class="max-w-[1440px] w-full grid grid-cols-1 lg:grid-cols-2
                gap-12 xl:gap-24 relative">

        {{-- Galería izquierda --}}
        <div class="flex flex-col gap-6 w-full">

            {{-- Breadcrumb móvil --}}
            <div class="lg:hidden flex flex-wrap gap-2 text-sm mb-4">
                <a class="text-slate-500 dark:text-[#9d9fb9] hover:text-primary
                          dark:hover:text-white transition-colors"
                   href="{{ url('/') }}">Inicio</a>
                <span class="text-slate-400">/</span>
                <a class="text-slate-500 dark:text-[#9d9fb9] hover:text-primary
                          dark:hover:text-white transition-colors"
                   href="{{ route('produc.index') }}">Productos</a>
                <span class="text-slate-400">/</span>
                <span class="text-primary font-medium">{{ $product->name }}</span>
            </div>

            {{-- Imagen principal --}}
            <div class="group relative w-full aspect-[4/3] bg-white
                        dark:bg-[#1a1c2e] rounded-xl overflow-hidden border
                        border-slate-200 dark:border-[#282a39] shadow-2xl">
                <div class="absolute inset-0 bg-gradient-to-tr from-primary/10
                            to-transparent opacity-50"></div>
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}"
                         alt="{{ $product->name }}"
                         class="w-full h-full object-contain transition-transform
                                duration-700 group-hover:scale-105"/>
                @else
                    <div class="w-full h-full flex items-center justify-center
                                text-slate-400">
                        <span class="material-symbols-outlined text-6xl">image</span>
                    </div>
                @endif
            </div>
        </div>

        {{-- Detalle derecha --}}
        <div class="relative">
            <div class="lg:sticky lg:top-32 flex flex-col h-full lg:h-auto gap-8">

                {{-- Breadcrumb escritorio --}}
                <div class="hidden lg:flex flex-wrap gap-2 text-sm">
                    <a class="text-slate-500 dark:text-[#9d9fb9] hover:text-primary
                              transition-colors" href="{{ url('/') }}">Inicio</a>
                    <span class="text-slate-300 dark:text-[#6366f1]">/</span>
                    <a class="text-slate-500 dark:text-[#9d9fb9] hover:text-primary
                              transition-colors"
                       href="{{ route('produc.index') }}">Productos</a>
                    <span class="text-slate-300 dark:text-[#6366f1]">/</span>
                    <span class="text-primary font-medium">{{ $product->name }}</span>
                </div>

                {{-- Nombre y precio --}}
                <div class="flex flex-col gap-2 border-b border-slate-200
                            dark:border-[#282a39] pb-6">
                    <h1 class="text-4xl md:text-5xl font-bold text-slate-900
                               dark:text-white tracking-tight mb-2">
                        {{ $product->name }}
                    </h1>
                    <p class="text-slate-600 dark:text-[#9d9fb9] text-sm
                              md:text-base max-w-md">
                        {{ $product->description }}
                    </p>
                    <div class="mt-4 flex items-baseline gap-4">
                        <h2 class="text-3xl font-bold text-primary">
                            ${{ number_format($product->price, 2) }}
                        </h2>
                        <span class="px-2 py-0.5 rounded text-xs font-bold
                                     bg-green-500/10 text-green-600 dark:text-green-400
                                     border border-green-500/20">
                            {{ $product->status === 'active' ? 'En stock' : 'Agotado' }}
                        </span>
                    </div>
                </div>

                {{-- Categoría --}}
                @if($product->category_id)
                <div class="flex items-center gap-2 text-sm text-slate-500
                            dark:text-[#9d9fb9]">
                    <span class="material-symbols-outlined text-[16px]">category</span>
                    Categoría:
                    <span class="text-slate-900 dark:text-white font-medium">
                        {{ optional($product->category)->name ?? 'Sin categoría' }}
                    </span>
                </div>
                @endif

                {{-- Botones de acción --}}
                <div class="flex flex-col gap-4 mt-4">
                    <div class="flex gap-4 h-14">
                        <button class="flex-1 bg-primary hover:bg-blue-600 text-white
                                       font-bold rounded-lg shadow-lg
                                       hover:shadow-primary/50 transition-all flex
                                       items-center justify-center gap-2 text-lg">
                            <span>Comprar ahora</span>
                            <span class="material-symbols-outlined text-[20px]">
                                arrow_forward
                            </span>
                        </button>
                        <button class="aspect-square h-full flex items-center
                                       justify-center rounded-lg border
                                       border-slate-200 dark:border-[#282a39]
                                       bg-white dark:bg-[#1a1c2e] hover:border-primary
                                       hover:text-primary text-slate-700 dark:text-white
                                       transition-all group">
                            <span class="material-symbols-outlined
                                         group-hover:scale-110 transition-transform">
                                favorite
                            </span>
                        </button>
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

                {{-- Volver al listado --}}
                <a href="{{ route('produc.index') }}"
                   class="flex items-center gap-2 text-sm text-slate-500
                          dark:text-[#9d9fb9] hover:text-primary transition-colors
                          border-t border-slate-200 dark:border-[#282a39] pt-4">
                    <span class="material-symbols-outlined text-[16px]">arrow_back</span>
                    Volver a productos
                </a>

            </div>
        </div>
    </div>
</main>
@endsection