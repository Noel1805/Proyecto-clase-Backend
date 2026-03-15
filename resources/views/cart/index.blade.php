@extends('layouts.app')

@section('title', 'Carrito de compras - TechStore')

@section('content')
<main class="flex-grow w-full max-w-[1440px] mx-auto px-4 lg:px-10 py-6 lg:py-10">

    <h1 class="text-3xl font-bold text-slate-900 dark:text-white mb-8">
        Carrito de compras
    </h1>

    @if(session('success'))
    <div class="mb-6 p-4 bg-green-50 dark:bg-green-500/10 border
                border-green-200 dark:border-green-500/30 rounded-lg
                text-green-800 dark:text-green-400 text-sm">
        {{ session('success') }}
    </div>
    @endif

    @if($cartItems->isEmpty())
    <div class="text-center py-20">
        <span class="material-symbols-outlined text-6xl
                     text-slate-300 dark:text-[#3b3d54]">
            shopping_cart
        </span>
        <p class="mt-4 text-slate-500 dark:text-[#9d9fb9] text-lg">
            Tu carrito está vacío.
        </p>
        <a href="{{ route('produc.index') }}"
           class="mt-6 inline-flex items-center gap-2 bg-primary
                  hover:bg-blue-600 text-white px-6 py-3 rounded-lg
                  font-medium transition-colors">
            <span class="material-symbols-outlined text-[18px]">arrow_back</span>
            Seguir comprando
        </a>
    </div>

    @else
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- Lista --}}
        <div class="lg:col-span-2 space-y-4">

            @foreach($cartItems as $item)
            <div class="flex gap-4 bg-white dark:bg-[#1c1c27] rounded-xl border
                        border-slate-200 dark:border-[#282a39] p-4 shadow-sm
                        items-center">

                {{-- Imagen --}}
                <a href="{{ route('product.show', $item->product) }}"
                   class="flex-shrink-0 w-20 h-20 bg-slate-50 dark:bg-[#111218]
                          rounded-lg overflow-hidden border
                          border-slate-200 dark:border-[#282a39]
                          flex items-center justify-center">
                    @if($item->product->image && $item->product->image !== 'no hay ruta')
                    <img src="{{ asset('storage/' . $item->product->image) }}"
                         alt="{{ $item->product->name }}"
                         class="w-full h-full object-contain p-2"/>
                    @else
                    <span class="material-symbols-outlined text-slate-400 text-2xl">
                        image
                    </span>
                    @endif
                </a>

                {{-- Info --}}
                <div class="flex-1 min-w-0">
                    <a href="{{ route('product.show', $item->product) }}"
                       class="text-sm font-medium text-slate-900 dark:text-white
                              hover:text-primary transition-colors truncate block">
                        {{ $item->product->name }}
                    </a>
                    <p class="text-primary font-bold text-sm mt-1">
                        ${{ number_format($item->product->price, 2) }}
                    </p>
                </div>

                {{-- Cantidad --}}
                @if($item->id)
                <form action="{{ route('cart.update', $item->id) }}"
                      method="POST" class="flex items-center">
                    @csrf
                    @method('PUT')
                    <input type="number" name="quantity" min="1" max="99"
                           value="{{ $item->quantity }}"
                           onchange="this.form.submit()"
                           class="w-16 text-center rounded-lg bg-slate-50
                                  dark:bg-[#111218] border border-slate-200
                                  dark:border-[#3b3d54] py-1.5 text-sm
                                  text-slate-900 dark:text-white focus:ring-2
                                  focus:ring-primary outline-none"/>
                </form>
                @else
                <span class="text-sm text-slate-500 dark:text-[#9d9fb9] px-3">
                    x{{ $item->quantity }}
                </span>
                @endif

                {{-- Subtotal --}}
                <p class="text-sm font-bold text-slate-900 dark:text-white
                          flex-shrink-0">
                    ${{ number_format($item->product->price * $item->quantity, 2) }}
                </p>

                {{-- Eliminar --}}
                <form action="{{ route('cart.remove', $item->id ?? $item->product->id) }}"
                      method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="p-2 text-red-400 hover:text-red-600
                                   hover:bg-red-500/10 rounded-lg transition-colors">
                        <span class="material-symbols-outlined text-[18px]">
                            delete
                        </span>
                    </button>
                </form>

            </div>
            @endforeach

            {{-- Vaciar --}}
            <div class="flex justify-end">
                <form action="{{ route('cart.clear') }}" method="POST"
                      onsubmit="return confirm('¿Vaciar todo el carrito?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="text-sm text-red-500 hover:text-red-700
                                   transition-colors flex items-center gap-1">
                        <span class="material-symbols-outlined text-[16px]">
                            delete_sweep
                        </span>
                        Vaciar carrito
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
                    Resumen del pedido
                </h2>

                <div class="space-y-3 border-b border-slate-200
                            dark:border-[#282a39] pb-4 mb-4">
                    @foreach($cartItems as $item)
                    <div class="flex justify-between text-sm">
                        <span class="text-slate-500 dark:text-[#9d9fb9] truncate
                                     max-w-[60%]">
                            {{ $item->product->name }} x{{ $item->quantity }}
                        </span>
                        <span class="text-slate-900 dark:text-white font-medium">
                            ${{ number_format($item->product->price * $item->quantity, 2) }}
                        </span>
                    </div>
                    @endforeach
                </div>

                <div class="flex justify-between text-base font-bold
                            text-slate-900 dark:text-white mb-6">
                    <span>Total</span>
                    <span class="text-primary">
                        ${{ number_format($total, 2) }}
                    </span>
                </div>

                <button class="w-full py-3 rounded-lg bg-primary hover:bg-blue-600
                               text-white font-bold transition-colors shadow-lg
                               shadow-primary/25 flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">payment</span>
                    Proceder al pago
                </button>

                <a href="{{ route('produc.index') }}"
                   class="mt-4 w-full py-2.5 rounded-lg border
                          border-slate-200 dark:border-[#3b3d54]
                          text-slate-700 dark:text-[#9d9fb9] text-sm font-medium
                          hover:bg-slate-50 dark:hover:bg-[#282a39] transition-colors
                          flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-[16px]">
                        arrow_back
                    </span>
                    Seguir comprando
                </a>

            </div>
        </div>

    </div>
    @endif

</main>
@endsection