@extends('layouts.app')

@section('title', 'TechStore - Home')

@section('content')
    <main class="flex-grow w-full max-w-[1440px] mx-auto px-4 lg:px-10 py-6 lg:py-10">
        
        <section class="@container mb-12 lg:mb-20">
            <div class="flex flex-col-reverse lg:flex-row items-center gap-8 lg:gap-16 bg-slate-100 dark:bg-slate-800/30 rounded-2xl p-6 lg:p-12 border border-slate-200 dark:border-slate-700/50">
                <div class="flex flex-col gap-6 flex-1 text-center lg:text-left items-center lg:items-start">
                    <div class="flex flex-col gap-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold uppercase tracking-wider w-fit mx-auto lg:mx-0">New Release</span>
                        <h1 class="text-slate-900 dark:text-white text-4xl sm:text-5xl lg:text-7xl font-bold leading-[1.1] tracking-tight">
                            The Future is <span class="text-primary">Foldable</span>.
                        </h1>
                        <h2 class="text-slate-600 dark:text-slate-400 text-base sm:text-lg font-normal leading-relaxed max-w-lg">
                            Experience varying display technology with the X-Phone 15. Unfold infinite possibilities in the palm of your hand.
                        </h2>
                    </div>
                    <div class="flex gap-4 w-full sm:w-auto flex-col sm:flex-row">
                        <button class="flex items-center justify-center rounded-lg h-12 px-8 bg-primary hover:bg-blue-600 text-white text-base font-bold transition-all shadow-lg shadow-primary/25">Pre-order Now</button>
                        <button class="flex items-center justify-center rounded-lg h-12 px-8 bg-transparent border border-slate-300 dark:border-slate-600 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-900 dark:text-white text-base font-medium transition-colors">Learn More</button>
                    </div>
                </div>
                <div class="w-full lg:w-1/2 flex items-center justify-center">
                    <div class="relative w-full aspect-square max-w-[500px]">
                        <div class="absolute inset-0 bg-gradient-to-tr from-primary/20 to-purple-500/20 rounded-full blur-3xl transform scale-75 animate-pulse"></div>
                        <img alt="Smartphone" class="relative w-full h-full object-contain drop-shadow-2xl z-10 hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDmf4tu6eP2qi3Vw3Xt6JgusNHiVBkN6mlfJSb1yEcASysZyvZoNSURYPv8zCe17F1ISBulEa6HtgiurDLC7eJjXevpil_0EZ0NT0ZnWKs5tcuLhLOVtMHMNqCZZE3xfuw1sKPlNCP1BqiTtO7fJa1JIcXr1OlXO46Hg5iEINtvvxwQ6w3HDmTipc9mbkkSeUDTx0ZI_gaAcXmbaYAM6fuLqF4PqKX5u3K0GVnejgb6kx83LsJPpGchKZRk5_tW4PYK0N09QITpJMY"/>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-10">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold">Shop by Category</h3>
                <a class="text-primary text-sm font-medium hover:underline flex items-center gap-1" href="#">View all <span class="material-symbols-outlined text-sm">arrow_forward</span></a>
            </div>
            <div class="flex gap-3 overflow-x-auto pb-4 scrollbar-hide">
                <button class="flex h-10 shrink-0 items-center justify-center gap-2 rounded-full bg-slate-900 dark:bg-white text-white dark:text-slate-900 px-6 font-medium text-sm shadow-md transition-transform hover:scale-105">All</button>
                <button class="flex h-10 shrink-0 items-center justify-center gap-2 rounded-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:border-primary text-slate-700 dark:text-slate-300 px-6 font-medium text-sm transition-all"><span class="material-symbols-outlined text-[18px]">laptop_mac</span> Laptops</button>
                <button class="flex h-10 shrink-0 items-center justify-center gap-2 rounded-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:border-primary text-slate-700 dark:text-slate-300 px-6 font-medium text-sm transition-all"><span class="material-symbols-outlined text-[18px]">smartphone</span> Smartphones</button>
                <button class="flex h-10 shrink-0 items-center justify-center gap-2 rounded-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:border-primary text-slate-700 dark:text-slate-300 px-6 font-medium text-sm transition-all"><span class="material-symbols-outlined text-[18px]">headphones</span> Audio</button>
            </div>
        </section>

        <section class="mb-16">
            {{-- HEADER DE PRODUCTOS + BOTÓN DE AÑADIR --}}
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                <h2 class="text-2xl font-bold">Featured Products</h2>
                <a href="{{ url('/product/create') }}" class="flex items-center gap-2 bg-primary hover:bg-blue-600 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition-colors shadow-lg shadow-primary/20">
                    <span class="material-symbols-outlined text-[20px]">add_circle</span>
                    Add New Product
                </a>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                @foreach($milista as $product)
                <div class="group flex flex-col bg-white dark:bg-slate-800 rounded-xl overflow-hidden border border-slate-200 dark:border-slate-700 hover:border-primary transition-all hover:shadow-xl relative">
                    
                    {{-- IMAGEN CLICKABLE: Redirige a la vista Show del producto --}}
                    <a href="{{ url('/product/' . $product->id) }}" class="relative w-full aspect-[4/3] bg-slate-50 dark:bg-slate-700/50 p-6 flex items-center justify-center block">
                        <img alt="{{ $product->name }}" class="w-full h-full object-contain transition-transform group-hover:scale-105" src="{{ asset('storage/' . $product->image) }}"/>
                    </a>
                    
                    <div class="p-4 flex flex-col gap-2 flex-1">
                        <div class="flex justify-between items-start">
                            {{-- TÍTULO CLICKABLE: Redirige a la vista Show del producto --}}
                            <a href="{{ url('/product/' . $product->id) }}" class="hover:text-primary transition-colors">
                                <h3 class="text-lg font-medium">{{ $product->name }}</h3>
                            </a>
                            <p class="text-primary font-bold">${{ number_format($product->price, 2) }}</p>
                        </div>
                        <p class="text-slate-500 dark:text-slate-400 text-sm line-clamp-2">{{ $product->description }}</p>
                        
                        {{-- BOTONES DE ACCIÓN (AGREGAR AL CARRITO, EDITAR Y ELIMINAR) --}}
                        <div class="mt-auto pt-4 flex gap-2 relative z-10">
                            {{-- Botón de Añadir --}}
                            <button class="flex-1 h-10 rounded-lg bg-slate-100 dark:bg-slate-700 text-slate-900 dark:text-white font-medium text-sm hover:bg-primary hover:text-white transition-colors flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined text-[18px]">add_shopping_cart</span> Add
                            </button>
                            
                            {{-- Botón de Editar --}}
                            <a href="{{ route('product.edit', $product->id) }}"
                               class="h-10 px-3 rounded-lg bg-blue-50 dark:bg-blue-500/10 text-blue-600 dark:text-blue-400 hover:bg-blue-600 hover:text-white transition-colors flex items-center justify-center shrink-0"
                               title="Editar Producto">
                                <span class="material-symbols-outlined text-[20px]">edit</span>
                            </a>
                            
                            {{-- Formulario para eliminar producto --}}
                            <form action="{{ route('product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este producto?');" class="shrink-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="h-10 px-3 rounded-lg bg-red-50 dark:bg-red-500/10 text-red-600 dark:text-red-400 hover:bg-red-600 hover:text-white transition-colors flex items-center justify-center" title="Delete Product">
                                    <span class="material-symbols-outlined text-[20px]">delete</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            {{-- PAGINACIÓN AQUÍ --}}
            <div class="mt-10">
                {{ $milista->links() }}
            </div>

        </section>

        <section class="mb-16 rounded-2xl bg-gradient-to-r from-slate-900 to-slate-800 dark:from-slate-800 dark:to-slate-900 p-8 lg:p-12 text-white relative overflow-hidden">
            <div class="relative z-10 flex flex-col lg:flex-row items-center justify-between gap-8">
                <div class="max-w-xl">
                    <h2 class="text-3xl font-bold mb-4">Join the Future Club</h2>
                    <p class="text-slate-300 text-lg">Get exclusive access to new drops and member-only discounts.</p>
                </div>
                <div class="w-full lg:w-auto flex-1 max-w-md">
                    <form class="flex gap-2">
                        <input class="flex-1 h-12 px-4 rounded-lg bg-white/10 border border-white/20 text-white placeholder:text-slate-400 focus:outline-none focus:border-primary" placeholder="Enter your email" type="email"/>
                        <button class="h-12 px-6 bg-primary hover:bg-blue-600 rounded-lg font-bold transition-colors" type="button">Subscribe</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection