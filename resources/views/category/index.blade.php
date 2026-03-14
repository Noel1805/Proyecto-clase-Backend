@extends('layouts.app')

@section('title', 'Categorías - TechStore')

@section('content')
<main class="flex-grow w-full max-w-[1440px] mx-auto px-4 lg:px-10 py-6 lg:py-10">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-start
                sm:items-center mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">
                Categorías
            </h1>
            <p class="text-slate-500 dark:text-[#9d9fb9] mt-1">
                {{ $categories->total() }} categorías registradas
            </p>
        </div>
        <a href="{{ route('category.create') }}"
           class="flex items-center gap-2 bg-primary hover:bg-blue-600
                  text-white px-5 py-2.5 rounded-lg text-sm font-medium
                  transition-colors shadow-lg shadow-primary/20">
            <span class="material-symbols-outlined text-[20px]">add_circle</span>
            Nueva categoría
        </a>
    </div>

    {{-- Alertas --}}
    @if(session('success'))
    <div class="mb-6 p-4 bg-green-50 dark:bg-green-500/10 border
                border-green-200 dark:border-green-500/30 rounded-lg
                text-green-800 dark:text-green-400 text-sm">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="mb-6 p-4 bg-red-50 dark:bg-red-500/10 border
                border-red-200 dark:border-red-500/30 rounded-lg
                text-red-800 dark:text-red-400 text-sm">
        {{ session('error') }}
    </div>
    @endif

    {{-- Tabla --}}
    <div class="bg-white dark:bg-[#1c1c27] rounded-xl border
                border-slate-200 dark:border-[#282a39] shadow-sm overflow-hidden">
        <table class="w-full">
            <thead class="bg-slate-50 dark:bg-[#111218] border-b
                          border-slate-200 dark:border-[#282a39]">
                <tr>
                    <th class="text-left px-6 py-4 text-xs font-medium uppercase
                               tracking-wider text-slate-500 dark:text-[#9d9fb9]">
                        #
                    </th>
                    <th class="text-left px-6 py-4 text-xs font-medium uppercase
                               tracking-wider text-slate-500 dark:text-[#9d9fb9]">
                        Nombre
                    </th>
                    <th class="text-left px-6 py-4 text-xs font-medium uppercase
                               tracking-wider text-slate-500 dark:text-[#9d9fb9]
                               hidden md:table-cell">
                        Descripción
                    </th>
                    <th class="text-left px-6 py-4 text-xs font-medium uppercase
                               tracking-wider text-slate-500 dark:text-[#9d9fb9]">
                        Productos
                    </th>
                    <th class="text-right px-6 py-4 text-xs font-medium uppercase
                               tracking-wider text-slate-500 dark:text-[#9d9fb9]">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200 dark:divide-[#282a39]">
                @forelse($categories as $category)
                <tr class="hover:bg-slate-50 dark:hover:bg-[#111218] transition-colors">
                    <td class="px-6 py-4 text-sm text-slate-500
                               dark:text-[#9d9fb9]">
                        {{ $category->id }}
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-sm font-medium text-slate-900
                                     dark:text-white">
                            {{ $category->name }}
                        </span>
                    </td>
                    <td class="px-6 py-4 hidden md:table-cell">
                        <span class="text-sm text-slate-500 dark:text-[#9d9fb9]
                                     line-clamp-1">
                            {{ $category->description ?? '—' }}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full
                                     text-xs font-medium bg-primary/10 text-primary">
                            {{ $category->products()->count() }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('category.edit', $category) }}"
                               class="p-2 rounded-lg text-slate-500
                                      dark:text-[#9d9fb9] hover:text-primary
                                      hover:bg-primary/10 transition-colors"
                               title="Editar">
                                <span class="material-symbols-outlined text-[18px]">
                                    edit
                                </span>
                            </a>
                            <form action="{{ route('category.destroy', $category) }}"
                                  method="POST"
                                  onsubmit="return confirm('¿Eliminar esta categoría?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="p-2 rounded-lg text-red-500
                                               hover:text-red-600 hover:bg-red-500/10
                                               transition-colors"
                                        title="Eliminar">
                                    <span class="material-symbols-outlined text-[18px]">
                                        delete
                                    </span>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-12 text-center text-slate-500
                                           dark:text-[#9d9fb9]">
                        No hay categorías registradas.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $categories->links() }}</div>

</main>
@endsection