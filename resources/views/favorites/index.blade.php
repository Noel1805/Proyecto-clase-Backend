@extends('layouts.app')

@section('title', 'Mis Favoritos - TechStore')

@section('content')
<main class="flex-grow w-full max-w-[1440px] mx-auto px-4 lg:px-10 py-6 lg:py-10">

    <h1 class="text-3xl font-bold text-slate-900 dark:text-white mb-8">
        Mis favoritos
    </h1>

    @if(session('success'))
    <div class="mb-6 p-4 bg-green-50 dark:bg-green-500/10 border
                border-green-200 dark:border-green-500/30 rounded-lg
                text-green-800 dark:text-green-400 text-sm">
        {{ session('success') }}
    </div>
    @endif

    @if($favorites->isEmpty())
    <div class="text-center py-20">
        <span class="material-symbols-outlined text-6xl
                     text-slate-300 dark:text-[#3b3d54]">
            favorite
        </span>
        <p class="mt-4 text-slate-500 dark:text-[#9d9fb9] text-lg">
            Aún no tienes productos favoritos.
        </p>
        <a href="{{ route('produc.index') }}"
           class="mt-6 inline-flex items-center gap-2 bg-primary
                  hover:bg-blue-600 text-white px-6 py-3 rounded-lg
                  font-medium transition-colors">
            <span class="material-symbols-outlined text-[18px]">arrow_back</span>
            Explorar productos
        </a>
    </div>

    @else
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- Lista --}}
        <div class="lg:col-span-2 space-y-4">

            @foreach($favorites as $product)
            <div class="flex gap-4 bg-white dark:bg-[#1c1c27] rounded-xl border
                        border-slate-200 dark:border-[#282a39] p-4 shadow-sm
                        items-center">

                {{-- Imagen --}}
                <a href="{{ route('product.show', $product) }}"
                   class="flex-shrink-0 w-20 h-20 bg-slate-50 dark:bg-[#111218]
                          rounded-lg overflow-hidden border
                          border-slate-200 dark:border-[#282a39]
                          flex items-center justify-center">
                    @if($product->image && $product->image !== 'no hay ruta')
                    <img src="{{ asset('storage/' . $product->image) }}"
                         alt="{{ $product->name }}"
                         class="w-full h-full object-contain p-2"/>
                    @else
                    <span class="material-symbols-outlined text-slate-400 text-2xl">
                        image
                    </span>
                    @endif
                </a>

                {{-- Info --}}
                <div class="flex-1 min-w-0">
                    <a href="{{ route('product.show', $product) }}"
                       class="text-sm font-medium text-slate-900 dark:text-white
                              hover:text-primary transition-colors truncate block">
                        {{ $product->name }}
                    </a>
                    <p class="text-slate-500 dark:text-[#9d9fb9] text-xs mt-0.5">
                        {{ optional($product->category)->name ?? 'Sin categoría' }}
                    </p>
                    <p class="text-primary font-bold text-sm mt-1">
                        ${{ number_format($product->price, 2) }}
                    </p>
                </div>

                {{-- Agregar al carrito --}}
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="h-10 px-4 rounded-lg bg-slate-100
                                   dark:bg-[#282a39] text-slate-900 dark:text-white
                                   hover:bg-primary hover:text-white transition-colors
                                   flex items-center justify-center gap-2 text-sm
                                   font-medium">
                        <span class="material-symbols-outlined text-[18px]">
                            add_shopping_cart
                        </span>
                        <span class="hidden sm:inline">Agregar</span>
                    </button>
                </form>

                {{-- Quitar de favoritos --}}
                <form action="{{ route('favorites.toggle', $product->id) }}"
                      method="POST">
                    @csrf
                    <button type="submit"
                            class="h-10 px-3 rounded-lg bg-red-50
                                   dark:bg-red-500/10 text-red-500
                                   hover:bg-red-500 hover:text-white
                                   transition-colors flex items-center justify-center"
                            title="Quitar de favoritos">
                        <span class="material-symbols-outlined text-[18px]"
                              style="font-variation-settings: 'FILL' 1">
                            favorite
                        </span>
                    </button>
                </form>

            </div>
            @endforeach

            {{-- Limpiar todos --}}
            <div class="flex justify-end">
                <form action="{{ route('favorites.clear') }}" method="POST"
                      onsubmit="return confirm('¿Eliminar todos los favoritos?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="text-sm text-red-500 hover:text-red-700
                                   transition-colors flex items-center gap-1">
                        <span class="material-symbols-outlined text-[16px]">
                            delete_sweep
                        </span>
                        Limpiar favoritos
                    </button>
                </form>
            </div>
        </div>

        {{-- Resumen --}}
        <div class="lg:col-span-1">
            <div class="bg-white dark:bg-[#1c1c27] rounded-xl border
                        border-slate-200 dark:border-[#282a39] shadow-sm p-6
                        lg:sticky lg:top-28">

                <h2 class="text-lg font-bold text-slate-900 dark:text-white mb-6">
                    Resumen
                </h2>

                <div class="space-y-3 border-b border-slate-200
                            dark:border-[#282a39] pb-4 mb-4">
                    <div class="flex justify-between text-sm">
                        <span class="text-slate-500 dark:text-[#9d9fb9]">
                            Productos guardados
                        </span>
                        <span class="text-slate-900 dark:text-white font-medium">
                            {{ $favorites->count() }}
                        </span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-slate-500 dark:text-[#9d9fb9]">
                            Valor total estimado
                        </span>
                        <span class="text-slate-900 dark:text-white font-medium">
                            ${{ number_format($favorites->sum('price'), 2) }}
                        </span>
                    </div>
                </div>

                {{-- Agregar todos al carrito --}}
                <form action="{{ route('favorites.addAllToCart') }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="w-full py-3 rounded-lg bg-primary hover:bg-blue-600
                                   text-white font-bold transition-colors shadow-lg
                                   shadow-primary/25 flex items-center
                                   justify-center gap-2">
                        <span class="material-symbols-outlined text-[18px]">
                            add_shopping_cart
                        </span>
                        Agregar todo al carrito
                    </button>
                </form>

                <a href="{{ route('produc.index') }}"
                   class="mt-4 w-full py-2.5 rounded-lg border
                          border-slate-200 dark:border-[#3b3d54]
                          text-slate-700 dark:text-[#9d9fb9] text-sm font-medium
                          hover:bg-slate-50 dark:hover:bg-[#282a39] transition-colors
                          flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-[16px]">
                        arrow_back
                    </span>
                    Seguir explorando
                </a>

            </div>
        </div>

    </div>
    @endif

</main>
@endsection