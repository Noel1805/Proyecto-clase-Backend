@extends('layouts.app')

@section('title', 'Editar Categoría - TechStore')

@section('content')
<main class="flex-grow w-full max-w-[1440px] mx-auto px-4 lg:px-10 py-6 lg:py-10">

    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900 dark:text-white">
            Editar categoría:
            <span class="text-primary">{{ $category->name }}</span>
        </h1>
        <p class="text-slate-500 dark:text-[#9d9fb9] mt-1">
            Modifica los datos de esta categoría.
        </p>
    </div>

    {{-- Errores --}}
    @if($errors->any())
    <div class="mb-6 p-4 bg-red-50 dark:bg-red-500/10 border
                border-red-200 dark:border-red-500/30 rounded-lg">
        <div class="flex items-center gap-2 text-red-800 dark:text-red-400
                    font-medium mb-2">
            <span class="material-symbols-outlined text-[18px]">error</span>
            Corrige los siguientes errores:
        </div>
        <ul class="list-disc list-inside text-sm text-red-700 dark:text-red-300
                   space-y-1">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        {{-- Formulario --}}
        <div class="lg:col-span-2">
            <form action="{{ route('category.update', $category) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="bg-white dark:bg-[#1c1c27] rounded-xl border
                            border-slate-200 dark:border-[#282a39] shadow-sm
                            overflow-hidden">

                    <div class="p-6 border-b border-slate-200 dark:border-[#282a39]">
                        <h2 class="text-base font-bold text-slate-900 dark:text-white
                                   mb-5 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary text-[20px]">
                                category
                            </span>
                            Información de la categoría
                        </h2>

                        <div class="space-y-5">

                            {{-- Nombre --}}
                            <div class="flex flex-col gap-2">
                                <label for="name"
                                       class="text-slate-700 dark:text-slate-300
                                              text-xs font-medium uppercase
                                              tracking-wider">
                                    Nombre *
                                </label>
                                <input type="text" name="name" id="name"
                                       value="{{ old('name', $category->name) }}"
                                       class="w-full rounded-lg bg-slate-50
                                              dark:bg-[#111218] border border-slate-200
                                              dark:border-[#3b3d54] px-4 py-3 text-sm
                                              text-slate-900 dark:text-white
                                              placeholder:text-slate-400
                                              dark:placeholder:text-[#9d9fb9]
                                              focus:ring-2 focus:ring-primary
                                              focus:border-transparent outline-none
                                              transition-all"
                                       placeholder="Ej: Smartphones"/>
                            </div>

                            {{-- Descripción --}}
                            <div class="flex flex-col gap-2">
                                <label for="description"
                                       class="text-slate-700 dark:text-slate-300
                                              text-xs font-medium uppercase
                                              tracking-wider">
                                    Descripción
                                </label>
                                <textarea name="description" id="description"
                                          rows="5"
                                          class="w-full rounded-lg bg-slate-50
                                                 dark:bg-[#111218] border
                                                 border-slate-200 dark:border-[#3b3d54]
                                                 px-4 py-3 text-sm text-slate-900
                                                 dark:text-white placeholder:text-slate-400
                                                 dark:placeholder:text-[#9d9fb9]
                                                 focus:ring-2 focus:ring-primary
                                                 focus:border-transparent outline-none
                                                 transition-all resize-none"
                                          placeholder="Descripción opcional de la categoría">{{ old('description', $category->description) }}</textarea>
                            </div>

                        </div>
                    </div>

                    {{-- Acciones --}}
                    <div class="p-6 flex items-center justify-between">
                        <a href="{{ route('category.index') }}"
                           class="text-sm text-slate-500 dark:text-[#9d9fb9]
                                  hover:text-primary transition-colors flex
                                  items-center gap-1">
                            <span class="material-symbols-outlined text-[16px]">
                                arrow_back
                            </span>
                            Cancelar
                        </a>
                        <button type="submit"
                                class="px-8 py-3 rounded-lg bg-primary text-white
                                       font-medium hover:bg-blue-600 transition-colors
                                       shadow-lg shadow-primary/25 flex items-center
                                       gap-2">
                            <span class="material-symbols-outlined text-[18px]">
                                save
                            </span>
                            Guardar categoría
                        </button>
                    </div>

                </div>
            </form>
        </div>

        {{-- Panel info --}}
        <div class="lg:col-span-1 space-y-4">

            {{-- Estadísticas de la categoría --}}
            <div class="bg-white dark:bg-[#1c1c27] rounded-xl border
                        border-slate-200 dark:border-[#282a39] shadow-sm p-6">
                <h3 class="text-sm font-bold text-slate-900 dark:text-white mb-4
                           flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary text-[18px]">
                        bar_chart
                    </span>
                    Estadísticas
                </h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-slate-500 dark:text-[#9d9fb9]">
                            Productos asociados
                        </span>
                        <span class="inline-flex items-center px-2.5 py-0.5
                                     rounded-full text-xs font-medium
                                     bg-primary/10 text-primary">
                            {{ $category->products()->count() }}
                        </span>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-slate-500 dark:text-[#9d9fb9]">
                            Creada el
                        </span>
                        <span class="text-slate-900 dark:text-white font-medium">
                            {{ $category->created_at->format('d/m/Y') }}
                        </span>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-slate-500 dark:text-[#9d9fb9]">
                            Última actualización
                        </span>
                        <span class="text-slate-900 dark:text-white font-medium">
                            {{ $category->updated_at->format('d/m/Y') }}
                        </span>
                    </div>
                </div>
            </div>

            {{-- Zona peligrosa --}}
            <div class="bg-red-50 dark:bg-red-500/5 rounded-xl border
                        border-red-200 dark:border-red-500/20 p-6">
                <h3 class="text-sm font-bold text-red-800 dark:text-red-400 mb-2
                           flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">
                        warning
                    </span>
                    Zona peligrosa
                </h3>
                <p class="text-xs text-red-700 dark:text-red-300 leading-relaxed mb-4">
                    Eliminar esta categoría es una acción irreversible.
                    Solo puedes eliminarla si no tiene productos asociados.
                </p>
                <form action="{{ route('category.destroy', $category) }}"
                      method="POST"
                      onsubmit="return confirm('¿Estás seguro de eliminar esta categoría? Esta acción no se puede deshacer.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="w-full py-2.5 rounded-lg bg-red-500
                                   hover:bg-red-600 text-white text-sm font-medium
                                   transition-colors flex items-center
                                   justify-center gap-2">
                        <span class="material-symbols-outlined text-[18px]">
                            delete
                        </span>
                        Eliminar categoría
                    </button>
                </form>
            </div>

        </div>
    </div>

</main>
@endsection