@extends('layouts.app')

@section('title', 'TechStore - Bienvenido')

@section('content')
<main class="flex-grow w-full max-w-[1440px] mx-auto px-4 lg:px-10 py-6 lg:py-10">

    {{-- Hero --}}
    <section class="mb-12 lg:mb-20">
        <div class="flex flex-col-reverse lg:flex-row items-center gap-8 lg:gap-16
                    bg-slate-100 dark:bg-slate-800/30 rounded-2xl p-6 lg:p-12
                    border border-slate-200 dark:border-slate-700/50">
            <div class="flex flex-col gap-6 flex-1 text-center lg:text-left
                        items-center lg:items-start">
                <span class="inline-flex items-center px-3 py-1 rounded-full
                             bg-primary/10 text-primary text-xs font-bold
                             uppercase tracking-wider w-fit mx-auto lg:mx-0">
                    Nuevo lanzamiento
                </span>
                <h1 class="text-slate-900 dark:text-white text-4xl sm:text-5xl
                           lg:text-7xl font-bold leading-[1.1] tracking-tight">
                    El Futuro es <span class="text-primary">Plegable</span>.
                </h1>
                <p class="text-slate-600 dark:text-slate-400 text-base sm:text-lg
                          font-normal leading-relaxed max-w-lg">
                    Descubre la tecnología más avanzada del mercado.
                    Desdobla posibilidades infinitas.
                </p>
                <div class="flex gap-4 w-full sm:w-auto flex-col sm:flex-row">
                    <a href="{{ route('produc.index') }}"
                       class="flex items-center justify-center rounded-lg h-12 px-8
                              bg-primary hover:bg-blue-600 text-white text-base
                              font-bold transition-all shadow-lg shadow-primary/25">
                        Ver productos
                    </a>
                </div>
            </div>
            <div class="w-full lg:w-1/2 flex items-center justify-center">
                <img alt="Producto destacado"
                     class="w-full max-w-[500px] h-auto object-contain drop-shadow-2xl
                            hover:scale-105 transition-transform duration-500"
                     src="https://lh3.googleusercontent.com/aida-public/AB6AXuDmf4tu6eP2qi3Vw3Xt6JgusNHiVBkN6mlfJSb1yEcASysZyvZoNSURYPv8zCe17F1ISBulEa6HtgiurDLC7eJjXevpil_0EZ0NT0ZnWKs5tcuLhLOVtMHMNqCZZE3xfuw1sKPlNCP1BqiTtO7fJa1JIcXr1OlXO46Hg5iEINtvvxwQ6w3HDmTipc9mbkkSeUDTx0ZI_gaAcXmbaYAM6fuLqF4PqKX5u3K0GVnejgb6kx83LsJPpGchKZRk5_tW4PYK0N09QITpJMY"/>
            </div>
        </div>
    </section>

    {{-- Categorías --}}
    <section class="mb-10">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-bold">Categorías</h3>
        </div>
        <div class="flex gap-3 overflow-x-auto pb-4">
            <button class="flex h-10 shrink-0 items-center justify-center gap-2
                           rounded-full bg-slate-900 dark:bg-white text-white
                           dark:text-slate-900 px-6 font-medium text-sm shadow-md">
                Todas
            </button>
            @foreach($categories->take(6) as $categoria)
            <a href="{{ route('produc.index') }}?category={{ $categoria->id }}"
               class="flex h-10 shrink-0 items-center justify-center gap-2 rounded-full
                      bg-white dark:bg-slate-800 border border-slate-200
                      dark:border-slate-700 hover:border-primary text-slate-700
                      dark:text-slate-300 px-6 font-medium text-sm transition-all">
                {{ $categoria->name }}
            </a>
            @endforeach
        </div>
    </section>

    {{-- Productos destacados --}}
    <section class="mb-16">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold">Productos destacados</h2>
            <a href="{{ route('produc.index') }}"
               class="text-primary text-sm font-medium hover:underline
                      flex items-center gap-1">
                Ver todos
                <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($featuredProducts as $product)
            <div class="group flex flex-col bg-white dark:bg-slate-800 rounded-xl
                        overflow-hidden border border-slate-200 dark:border-slate-700
                        hover:border-primary transition-all hover:shadow-xl">
                <a href="{{ url('/product/' . $product->id) }}"
                   class="relative w-full aspect-[4/3] bg-slate-50
                          dark:bg-slate-700/50 p-6 flex items-center justify-center">
                    <img alt="{{ $product->name }}"
                         class="w-full h-full object-contain transition-transform
                                group-hover:scale-105"
                         src="{{ asset('storage/' . $product->image) }}"/>
                </a>
                <div class="p-4 flex flex-col gap-2 flex-1">
                    <div class="flex justify-between items-start">
                        <a href="{{ url('/product/' . $product->id) }}"
                           class="hover:text-primary transition-colors">
                            <h3 class="text-base font-medium">{{ $product->name }}</h3>
                        </a>
                        <p class="text-primary font-bold text-sm">
                            ${{ number_format($product->price, 2) }}
                        </p>
                    </div>
                    <p class="text-slate-500 dark:text-slate-400 text-sm line-clamp-2">
                        {{ $product->description }}
                    </p>
                    <div class="mt-auto pt-3">
                        <button class="w-full h-9 rounded-lg bg-slate-100
                                       dark:bg-slate-700 text-slate-900 dark:text-white
                                       font-medium text-sm hover:bg-primary
                                       hover:text-white transition-colors flex
                                       items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-[18px]">
                                add_shopping_cart
                            </span>
                            Agregar
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

</main>
@endsection